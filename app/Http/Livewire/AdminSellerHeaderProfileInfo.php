<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSellerHeaderProfileInfo extends Component
{
    public $admin;
    public $seller;
    public $listeners = ['UpdateAdminSellerHeaderInfo' => '$refresh'];

    public function mountt()
    {
        if (Auth::guard('admin')->check()) {
            $this->admin = Admin::findOrFail(Auth::guard('admin')->id());
        }
        if (Auth::guard('seller')->check()) {
            $this->seller = Seller::findOrFail(Auth::guard('seller')->id());
        }
    }

    public function render()
    {
        return view('livewire.admin-seller-header-profile-info');
    }
}
