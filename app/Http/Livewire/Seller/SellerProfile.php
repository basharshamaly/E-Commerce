<?php

namespace App\Http\Livewire\Seller;

use App\Models\Seller;

use Livewire\Component;


class SellerProfile extends Component
{

    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab' => ['keep' => true]];

    public $name, $email, $username, $phone, $address;


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
