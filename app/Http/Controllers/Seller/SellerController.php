<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Mail\FormResetPasswordMailSeller;
use App\Mail\ResetPasswordMailSeller;
use App\Mail\VerifiedAccountSellerMail;
use App\Models\Seller;
use App\Models\VerificationToken;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use SawaStacks\Utils\Kropify;
use App\Helpers\MyKropify;


class SellerController extends Controller
{
    public function home(Request $request)
    {
        return view('back.pages.seller.home');
    }
    public function login(Request $request)
    {
        return view('back.pages.seller.auth.login');
    }
    public function register(Request $request)
    {
        return view('back.pages.seller.auth.register');
    }

    public function registerSuccess(Request $request)
    {
        return view('back.pages.seller.register-success');
    }

    public function createSeller(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'min:5|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:5',

        ]);

        $sellers = new Seller();
        $sellers->name = $request->name;
        $sellers->email = $request->email;
        $sellers->password = Hash::make($request->password);
        $save = $sellers->save();

        if ($save) {
            //genarate token to make verification to seeler account
            $token = Str::random(64);

            // $token = base64_encode(random_bytes(32)); // 32 بايت (256 بت)


            VerificationToken::create([
                'user_type' => 'seller',
                'email' => $request->email,
                'token' => $token,

            ]);
            //route you make to check if your account is  verified
            $actionLink = route('seller.virefy', ['token' => $token]);

            //to show in message well be recevied by owner seller account on email private to owner account

            // $data['seller_name'] = $request->name;
            // $data['seller_email'] = $request->email;
            // $data['actionLink'] = $actionLink;

            $data = [
                'sellers' => $sellers,
                'actionLink' => $actionLink,
            ];

            //sendActivation Link to owner
            $mail_body = view('email-templates.seller-verify-template', $data)->render();

            $mailconfig = [
                'mail_from_email' => env('MAIL_FROM_EMAIL'),
                'mail_from_name' => env('MAIL_FROM_NAME'),
                'mail_recipient_email' => $request->email,
                'mail_recipient_name' => $request->name,
                'mail_subject' => 'verfiry seller account',
                'mail_body' => $mail_body,

            ];



            try {
                Mail::to($sellers->email)->send(new VerifiedAccountSellerMail($actionLink, $sellers, $mail_body));
                session()->flash('success', 'We have sent you a verification link to activate your seller account.');
            } catch (\Exception $e) {
                dd($e->getMessage()); // عرض الخطأ
                session()->flash('fail', 'Something went wrong, please try again.');
            }


            return redirect()->route('seller.registerSuccess');



            // if (SendEmail($mailconfig)) {
            //     return redirect()->route('seller.registerSuccess');
            // } else {
            //     return redirect()->route('seller.register')->with('fail', 'somthing went wrong');
            // }
        }
    }

    public function VirefyAccount(Request $request, $token)
    {
        //check if token private to this sellers  exits or not exits
        $verifyed = VerificationToken::where('token', $token)->first();
        //if query not empty and token exists
        if (!is_null($verifyed)) {
            //get data where email is equal
            $sellers = Seller::where('email', $verifyed->email)->first();
            //if column verified is  empty or value equal to 0
            if (!$sellers->verified) {
                $sellers->verified = 1;
                $sellers->email_verified_at = Carbon::now();

                $sellers->save();
                return redirect()->route('seller.login')->with('success', 'your account become is verified ');
            } else {
                //if verified column content value equal 1
                return redirect()->route('seller.login')->with('info', 'your account  is verified already ');
            }
        } else {
            return redirect()->route('seller.register')->with('fail', 'Invalid Token');
        }
    }

    public function loginHandler(Request $request)
    {
        //to know what user enter value username or email
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:sellers,email',
                'password' => 'required|min:5|max:45',
            ], []);
        } else {
            $request->validate([
                'login_id' => 'required|exists:sellers,username',
                'password' => 'required|min:5|max:45',
            ], []);
        }

        $cred = [
            //type $fieldType=>$request->login_id because multi value possiple (email or username)
            $fieldType => $request->login_id,
            'password' => $request->password,
        ];
        if (Auth::guard('seller')->attempt($cred)) {
            // return redirect()->route('seller.home');
            if (!auth('seller')->user()->verified) {
                auth('seller')->logout();
                return redirect()->route('seller.login')->with('fail', 'your account not verified please check your email');
            } else {
                return redirect()->route('seller.home');
            }
        } else {
            return redirect()->route('seller.login')->withInput()->with('fail', 'login faield');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('seller.login')->withInput()->with('fail', 'you logout now');
    }

    public function forgotPassword(Request $request)
    {
        return view('back.pages.seller.auth.forgot-password');
    }


    public function resetPasswordLink(Request $request)
    {
        // التحقق من صحة الإدخال
        $request->validate([
            'email' => 'required|email|exists:sellers,email'
        ]);

        // جلب بيانات البائع باستخدام البريد الإلكتروني
        $sellers = Seller::where('email', $request->email)->first();
        if (!$sellers) {
            session()->flash('fail', 'This email does not exist in our records.');
            return redirect()->route('seller.forgot-password');
        }

        // إنشاء رمز إعادة تعيين كلمة المرور
        $token = base64_encode(Str::random(64));

        // التحقق مما إذا كان هناك رمز قديم موجود
        $oldToken = DB::table('password_resets')->where('email', $request->email)->where('guard', 'seller')->first();

        if ($oldToken) {
            // تحديث التوكن إذا كان موجودًا
            DB::table('password_resets')->where('email', $request->email)->where('guard', 'seller')->update([
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        } else {
            // إدخال بيانات جديدة إذا لم يكن هناك رمز قديم
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'guard' => 'seller',
                'created_at' => Carbon::now(),
            ]);
        }

        // إنشاء رابط إعادة التعيين
        $actionLink = route('seller.form-reset-password', ['token' => $token, 'email' => urlencode($sellers->email)]);

        // إعداد بيانات البريد الإلكتروني
        $data = [
            'actionLink' => $actionLink,
            'seller' => $sellers,
        ];

        // إنشاء قالب البريد الإلكتروني
        $mailbody = view('email-templates.seller-forgot-email-temblate', $data)->render();

        // إعداد بيانات الإرسال
        $mailconfig = [
            'mail_from_email' => env('MAIL_FROM_EMAIL'),
            'mail_from_name' => env('MAIL_FROM_NAME'),
            'mail_recipient_name' => $sellers->name,
            'mail_recipient_email' => $request->email,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mailbody,
        ];

        // إرسال البريد الإلكتروني مع التعامل مع الأخطاء
        try {
            Mail::to($sellers->email)->send(new ResetPasswordMailSeller($actionLink, $sellers));
            session()->flash('success', 'We have sent you a reset password email.');
        } catch (\Exception $e) {
            session()->flash('fail', 'Something went wrong while sending the email, please try again.');
        }

        return redirect()->route('seller.forgot-password')->with('success', 'please check your email you resived link to reset password');
    }

    public function formResetPassword(Request $request, $token)
    {

        //get details token
        $get_token = DB::table('password_resets')->where('token', $token)->where('guard', 'seller')->first();

        if ($get_token) {
            //check if token not expired
            $diffMinus = Carbon::createFromFormat('Y-m-d H:i:s', $get_token->created_at)->diffInMinutes(Carbon::now());

            if ($diffMinus > 15) {
                //when token is older from 15 minutes
                return redirect()->route('seller.forgot-password', ['token' => $token])->with('fail', 'token invalid because this token is valid to first 15 minutes');
            } else {
                return view('back.pages.seller.auth.reset')->with(['token' => $token]);
            }
        }
    }



    public function resetPasswordHandler(Request $request)
    { {
            // ✅ التحقق من صحة الإدخال
            $request->validate([
                'new_password' => 'required|min:5|max:45|required_with:confirm_new_password|same:confirm_new_password',
                'confirm_new_password' => 'required',
                // 'token' => 'required' // تأكد من أن التوكن يتم تمريره
            ]);


            // ✅ التحقق من وجود التوكن في قاعدة البيانات
            $get_token = DB::table('password_resets')->where('token', $request->token)->first();

            if (!$get_token) {
                return back()->with('fail', 'Invalid or expired password reset token.');
            }

            // ✅ التحقق من وجود البائع بناءً على البريد الإلكتروني المخزن في التوكن
            $sellers = Seller::where('email', $get_token->email)->first();

            if (!$sellers) {
                return back()->with('fail', 'Seller account not found.');
            }



            // ✅ تحديث كلمة المرور
            $passwordHashed = Hash::make($request->new_password);
            $updateStatus = Seller::where('email', $get_token->email)->update([
                'password' => $passwordHashed,
            ]);

            // 🛠 التحقق مما إذا تم تحديث كلمة المرور
            if ($updateStatus === 0) {
                return back()->with('fail', 'Password update failed. Try again.');
            }

            // ✅ حذف التوكن بعد نجاح تغيير كلمة المرور
            DB::table('password_resets')->where([
                'token' => $request->token,
                'email' => $sellers->email,
            ])->delete();

            $data = [
                'seller' => $sellers,
                'new_password' => $request->new_password,
            ];

            // إنشاء قالب البريد الإلكتروني
            $mailbody = view('email-templates.seller-email-reset-template', $data)->render();

            // إعداد بيانات الإرسال
            $mailconfig = [
                'mail_from_email' => env('MAIL_FROM_EMAIL'),
                'mail_from_name' => env('MAIL_FROM_NAME'),
                'mail_recipient_name' => $sellers->name,
                'mail_recipient_email' => $sellers->email,
                'mail_subject' => 'Reset Password',
                'mail_body' => $mailbody,
            ];

            try {
                Mail::to($sellers->email)->send(new FormResetPasswordMailSeller($sellers, $request->new_password));
                session()->flash('success', 'Password has been changed successfully.');
            } catch (\Exception $e) {
                \Log::error('Email failed: ' . $e->getMessage());
                return redirect()->route('seller.login')->with('fail', 'Password updated, but failed to send email notification.');
            }

            return redirect()->route('seller.login')->with('success', 'Password has been changed successfully.');


            // إعادة التوجيه مع رسالة نجاح إذا لم تحدث أي استثناءات
        }
    }

    public function profileSeller()
    {
        return view('back.pages.seller.profile');
    }



    public function updatedSellerProfilePicture(Request $request)
    {
        if (!$request->hasFile('sellerProfilePictureFile')) {
            return response()->json(['status' => 0, 'msg' => 'لم يتم اختيار أي صورة 👀']);
        }

        $file = $request->file('sellerProfilePictureFile');

        if (!$file || !$file->isValid()) {
            return response()->json(['status' => 0, 'msg' => 'الملف غير صالح ❌']);
        }

        $seller = Seller::findOrFail(auth('seller')->id());

        $path = public_path('/images/sellers/');
        $filename = 'SELLER_IMG_' . $seller->id . '.jpg';
        $old_picture = $seller->picture ?? null;

        $upload = Kropify::getFile($file, $filename)
            ->maxWoH(325)
            ->save($path);

        $infos = Kropify::getInfo();

        if ($upload) {
            if ($old_picture && File::exists($path . $old_picture)) {
                File::delete($path . $old_picture);
            }

            $seller->update([
                'picture' => $infos->getName,
            ]);

            return response()->json(['status' => 1, 'msg' => 'تم تحديث الصورة بنجاح ✅']);
        }

        return response()->json(['status' => 0, 'msg' => 'فشل في تحديث الصورة 😢']);
    }
}
