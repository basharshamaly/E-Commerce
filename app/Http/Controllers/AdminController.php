<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Mail\ResetPasswordMailer;
use App\Models\Admin;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\HtmlPart;
use Symfony\Component\Mime\Part\TextPart;


use Stringable;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class AdminController extends Controller
{
    //

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($fieldType == 'email') {
            $request->validate([
                'login_id' => "required|email|exists:admins,{$fieldType}",
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email  or Username must be entried',
                'login_id.email' => 'this faild   must be Email',
                'login_id.exists' => 'this email not exists',
                'password.required' => 'password must be entried',
                'password.min' => 'password must be at leat 5 characters',
                'password.max' => 'password must be at more 45 characters',
            ]);
        } else {

            $request->validate([
                'login_id' => "required|exists:admins,{$fieldType}",
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email  or Username must be entried',

                'login_id.exists' => 'this username not exists',
                'password.required' => 'password must be entried',
                'password.min' => 'password must be at leat 5 characters',
                'password.max' => 'password must be at more 45 characters',
            ]);
        }

        $cred = array(
            $fieldType => $request->login_id,
            'password' => $request->password,
        );
        if (Auth::guard('admin')->attempt($cred)) {
            return redirect()->route('admin.home');
        } else {
            session()->flash('fail', 'incorrect email or password');
            return redirect()->route('admin.login');
        }
    }


    public function logoutHandler(Request $request)
    {
        $x = Auth::guard('admin')->logout();
        if ($x) {
            session()->flash('success', 'You have logged out successfully');
            return redirect()->route('admin.login');
        } else {
            session()->flash('fail', 'You have logged out faield');
            return redirect()->back();
        }
    }

    public function SendPasswordResetLink(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:admins,email'
            ],
            [
                'email.required' => 'the :attribute faild should be a fail ',
                'email.email' => 'this faild should be a valid email',
                'email.exists' => 'this email does not exist',
            ]
        );
        $admin = Admin::where('email', $request->email)->first();
        $token = base64_encode(Str::random(64));
        $oldToken = DB::table('password_resets')->where('email', $request->email)->first();
        if ($oldToken) {
            DB::table('password_resets')->where('email', $request->email)->update(
                [
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]
            );
        } else {
            DB::table('password_resets')->insert([

                'email' => $request->email,
                'guard' => 'admin',
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }
        $actionLink = route('admin.reset-password', [
            'token' => $token,
            'email' => $request->email,

        ]);
        $data = [

            'actionLink' => $actionLink,
            'admin' => $admin,
        ];

        $mail_body = view('email-templates.admin-forgot-email-template', $data)->render();
        $mailconfig = [

            'mail_From_name' => env('Mail_From_name'),
            'mail_From_email' => env('MAIL_FROM_EMAIL'),
            'mail_recipient_email' => $admin->email,
            'mail_recipient_name' => $admin->name,
            'mail_subject' => 'Reset Password',
            'mail_body' => $mail_body,

        ];


        try {
            Mail::to($admin->email)->send(new ResetPasswordMail($actionLink, $admin));
            session()->flash('success', 'We have sent you a reset password email.');
        } catch (\Exception $e) {
            session()->flash('fail', 'Something went wrong, please try again.');
        }

        return redirect()->route('admin.forgot-password');
    }
    public function resetpassword(Request $request, $token = null)
    {


        $check_token = DB::table('password_resets')->where('token', $token)->first();

        if ($check_token) {
            //check if token not expired
            $diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $check_token->created_at)->diffInMinutes(Carbon::now());
            if ($diffMins > 15) {
                //if token expired
                session()->flash('fail', 'token is expired,request another reset password link');
                return redirect()->route('admin.forgot-password', ['token', $token]);
            } else {

                return view('back.pages.admin.auth.reset_password')->with(['token' => $token]);
            }
        } else {
            session()->flash('fail', 'invalid token');
            return redirect()->route('admin.forgot-password', ['token' => $token]);
        }
    }

    public function resetPasswordHandler(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:5|max:45|same:confirm_new_password',
            'confirm_new_password' => 'required',
        ], [
            'new_password.required' => 'This field is required. Please enter a new password.',
            'new_password.min' => 'The password should be at least 5 characters.',
            'new_password.max' => 'The password should be at most 45 characters.',
            'confirm_new_password.required' => 'Please confirm the new password.',
        ]);

        $token = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$token) {
            // إذا لم يتم العثور على التوكن، نعيد المستخدم برسالة خطأ
            return redirect()->route('admin.login')->with('fail', 'Invalid or expired token.');
        }

        // Get admin details and update password
        $admin = Admin::where('email', $token->email)->first();
        if (!$admin) {
            return redirect()->route('admin.login')->with('fail', 'Admin not found.');
        }
        Admin::where('email', $admin->email)->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Delete the token record
        DB::table('password_resets')->where([
            'token' => $request->token,
            'email' => $admin->email
        ])->delete();

        // Prepare email data and configuration
        $data = [
            'admin' => $admin,
            'new_password' => $request->new_password,
        ];
        $mail_body = view('email-templates.admin-reset-email-template', $data)->render();
        $mailconfig = [
            'mail-from-email' => env('MAIL_FROM_EMAIL'),
            'mail-from-name' => env('MAIL_FROM_NAME'),
            'mail-recipient' => $admin->email,
            'mail-recipient-name' => $admin->name,
            'mail-subject' => 'Password Changed',
            'mail-body' => $mail_body,
        ];


        Mail::to($mailconfig['mail-recipient'])->send(new ResetPasswordMailer($mailconfig['mail-body'], $admin));
        Log::info('Email sent to ' . $mailconfig['mail-recipient']);
        return redirect()->route('admin.login')->with('success', 'Done! Password has been changed successfully');
    }

    public function profileView(Request $request)
    {

        $admin = null;
        if (Auth::guard('admin')->check()) {
            $admin = Admin::findOrFail(Auth::guard('admin')->id());
        }
        return view('back.pages.admin.profile', compact('admin'));
    }

    public function changeProfilePicture(Request $request)
    {
        try {
            $admin = Admin::findOrFail(auth('admin')->id());

            if (!$request->hasFile('adminProfilePictureFile')) {
                return response()->json(['status' => 0, 'msg' => 'No file uploaded']);
            }

            $file = $request->file('adminProfilePictureFile');
            if (!$file->isValid()) {
                return response()->json(['status' => 0, 'msg' => 'Invalid file']);
            }

            $path = '/images/admins/';
            $old_picture = $admin->getAttributes()['picture'];
            $filename = 'ADMIN_IMG_' . rand(2, 1000) . '_' . $admin->id . '_' . time() . '.jpg';

            $upload = $file->move(public_path($path), $filename);
            if ($upload) {
                if ($old_picture && File::exists(public_path($path . $old_picture))) {
                    File::delete(public_path($path . $old_picture));
                }
                $admin->update(['picture' => $filename]);
                return response()->json(['status' => 1, 'msg' => 'Image uploaded successfully']);
            }

            return response()->json(['status' => 0, 'msg' => 'Failed to upload image']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'msg' => $e->getMessage()]);
        }
    }

    public function changeLogo(Request $request)
    {

        $file = $request->file('site_logo');
        if ($file) {
            $filename = 'LOGO_' . uniqid() . ('.') . $file->getClientOriginalExtension();
            $path = '/images/site/';
            $file->move(public_path($path), $filename);
            $settings = new GeneralSetting();
            $old_logo = $settings->site_logo;
            $file_path = $path . $old_logo;
            $settings = GeneralSetting::first();
            $settings->site_logo = $filename;
            $save = $settings->save();
            if ($save) {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Logo image updated successfully',
                    'new_logo_path' => asset('images/site/' . $settings->site_logo) // الرابط الجديد للصورة
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Failed to save the new logo.'
                ]);
            }
        } else {
            return response()->json(['status' => 0, 'msg' => 'No file uploaded.']);
        }
    }

    public function changeFavIcon(Request $request)
    {

        $file = $request->file('site_favicon');
        if ($file) {
            $filename = 'FAVICON_' . uniqid() . ('.') . $file->getClientOriginalExtension();
            $path = '/images/site/';
            $file->move(public_path($path), $filename);
            $settings = new GeneralSetting();
            $old_site_favicon = $settings->site_favicon;
            $file_path = $path . $old_site_favicon;
            $settings = GeneralSetting::first();
            $settings->site_favicon = $filename;
            $save = $settings->save();
            if ($save) {
                return response()->json([
                    'status' => 1,
                    'msg' => 'favicon image updated successfully',
                    'new_favicon_path' => asset('images/site/' . $settings->site_favicon) // الرابط الجديد للصورة
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Failed to save the new logo.'
                ]);
            }
        } else {
            return response()->json(['status' => 0, 'msg' => 'No file uploaded.']);
        }
    }
}