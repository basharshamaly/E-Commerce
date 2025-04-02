<?php

namespace App\Http\Livewire\Seller;

use App\Mail\FormResetPasswordMailSeller;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;


class SellerProfile extends Component
{

    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab' => ['keep' => true]];

    public $name, $email, $username, $phone, $address;
    public $current_password, $new_password, $confirm_new_password;
    public $listeners = [
        'UpdateSellerProfilePicture' => '$refresh',
    ];




    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->tabname;
        $seller = Seller::findOrFail(auth('seller')->id());
        $this->name = $seller->name;
        $this->email = $seller->email;
        $this->username = $seller->username;
        $this->phone = $seller->phone;
        $this->address = $seller->address;
    }

    public function saveSellerProfileInfo()
    {

        $this->validate([
            'name' => 'required|min:5',
            // هذا الشرط يسبب فشل التحقق حتى لو المستخدم لم يغير الـ username، لأن Laravel يعتبره مكررًا (هو موجود بالفعل). فلازم تستثني الـ seller الحالي من التحقق.
            'username' => 'nullable|min:5|unique:sellers,username,' . auth('seller')->id()
        ]);



        $seller = Seller::findOrFail(auth('seller')->id());
        $seller->name = $this->name;
        $seller->email = $this->email;
        $seller->username = $this->username;
        $seller->phone = $this->phone;
        $seller->address = $this->address;

        $save = $seller->save();
        if ($save) {
            // return $this->showToastr('success', 'profile seller info updted.');
            session()->flash('success', 'profile seller info updted.');
        } else {
            // return $this->showToastr('error', 'faield  updted profile seller info .');
            session()->flash('fail', 'faield  updted profile seller info .');
        }
    }

    public function updatePasswordSeller()
    {
        $seller = Seller::findOrFail(auth('seller')->id());

        // ✅ التحقق من كلمة المرور الحالية بالإضافة للتطابق مع كلمة المرور في قاعدة البيانات
        $this->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($seller) {
                    if (!Hash::check($value, $seller->password)) {
                        $fail(__('كلمة المرور الحالية غير صحيحة'));
                    }
                }
            ],
            'new_password' => 'required|min:6',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        // تحديث كلمة المرور
        $update = $seller->update([
            'password' => Hash::make($this->new_password),
        ]);

        if ($update) {
            // إعداد الإيميل
            $data = ['seller' => $seller, 'new_password' => $this->new_password];
            $mailbody = view('email-templates.seller-email-reset-template', $data)->render();

            $mailconfig = [
                'mail_from_email' => env('MAIL_FROM_EMAIL'),
                'mail_from_name' => env('MAIL_FROM_NAME'),
                'mail_recipient_name' => $seller->name,
                'mail_recipient_email' => $seller->email,
                'mail_subject' => 'Reset Password',
                'mail_body' => $mailbody,
            ];

            try {
                Mail::to($seller->email)->send(new FormResetPasswordMailSeller($seller, $this->new_password));
                session()->flash('success', 'تم تغيير كلمة المرور بنجاح ✅');
            } catch (\Exception $e) {
                \Log::error('Email failed: ' . $e->getMessage());
                return redirect()->route('seller.login')->with('fail', 'تم تغيير كلمة المرور، لكن فشل إرسال البريد.');
            }

            // تنظيف الحقول
            $this->current_password = null;
            $this->new_password = null;
            $this->confirm_new_password = null;

            return redirect()->route('seller.profile')->with('success', 'تم تغيير كلمة المرور بنجاح ✅');
        } else {
            session()->flash('fail', 'فشل في تحديث كلمة المرور.');
        }
    }




    public function  showToastr($type, $message)
    {
        return $this->dispatchBrowserEvent('showToastr', ['type' => $type, 'message' => $message]);
    }

    public function render()
    {
        return view('livewire.seller.seller-profile', [
            'seller' => Seller::findOrFail(auth('seller')->id()),
        ]);
    }
}
