<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminProfileTabs extends Component
{
    public $tab = 'personaldetails'; // Default tab
    public $current_password, $new_password, $new_password_confirmation;

    public function selectTab($tabName)
    {
        $this->tab = $tabName;
    }

    public function render()
    {

        return view('livewire.admin-profile-tabs', [
            'tab' => $this->tab,
        ]);
    }

    public function updatePassword()
    {

        $this->validate([

            'current_password' => [
                'required',
                function ($value, $attribute, $fail) {
                    $admin = Admin::find(auth('admin')->id());

                    if (!$admin || !Hash::check($this->current_password, $admin->password)) {
                        return $fail(__('Invalid password'));
                    }
                }
            ],
            'new_password' => 'required|min:5|max:45|confirmed',
        ]);
        $query = Admin::findOrFail(auth('admin')->id())->update([
            'password' => Hash::make($this->new_password),
        ]);
        if ($query) {
            $this->current_password = $this->new_password = $this->new_password_confirmation = null;

            session()->flash('success', 'Password change successful');
        } else {

            session()->flash('error', 'Password change faield');
        }
    }
}
