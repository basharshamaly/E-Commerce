<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Mail\VerifiedAccountSellerMail;
use App\Models\Seller;
use App\Models\VerificationToken;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Colors\Rgb\Channels\Red;

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

        return redirect()->route('seller.login')->withInput()->with('fail', 'you logout now');
    }
}
