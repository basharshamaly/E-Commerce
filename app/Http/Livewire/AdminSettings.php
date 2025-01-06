<?php

namespace App\Http\Livewire;

use App\Models\GeneralSetting;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use Livewire\Component;

class AdminSettings extends Component
{
    public $tab = null;
    public $site_name, $site_email, $site_phone, $site_meta_keywords, $site_meta_description, $site_logo, $site_favicon, $site_address;
    public $default_tab = 'general_settings';
    protected $query_string = ['tab'];
    public $facebook_url, $twiter_url, $instgram_url, $github_url, $youtyope_url, $linkedin_url;

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        $this->tab = request()->tab ? request()->tab : $this->default_tab;
        $settings = new GeneralSetting();
        $this->site_name = $settings->site_name;
        $this->site_email = $settings->site_email;
        $this->site_phone = $settings->site_phone;
        $this->site_logo = $settings->site_logo;
        $this->site_favicon = $settings->site_favicon;
        $this->site_meta_keywords = $settings->site_meta_keywords;
        $this->site_meta_description = $settings->site_meta_description;
        $this->site_address = $settings->site_address;

        $socialnetworks = new SocialNetwork();
        $this->facebook_url = $socialnetworks->facebook_url;
        $this->twiter_url = $socialnetworks->twiter_url;
        $this->instgram_url = $socialnetworks->instgram_url;
        $this->github_url = $socialnetworks->github_url;
        $this->youtyope_url = $socialnetworks->youtyope_url;
        $this->linkedin_url = $socialnetworks->linkedin_url;
    }

    public function updateGeneralSettings()
    {
        $this->validate([
            'site_name' => 'required',
            'site_email' => 'required|email',
        ], [
            'site_name.required' => 'this faield site name required',
            'site_email.required' => 'this faield site email required',
            'site_email.email' => 'this faield shold be invalid email ',
        ]);

        $settings = new GeneralSetting();
        // $settings = $settings->first();
        $settings->site_name = $this->site_name;
        $settings->site_email = $this->site_email;
        $settings->site_phone = $this->site_phone;
        $settings->site_meta_keywords = $this->site_meta_keywords;
        $settings->site_meta_description = $this->site_meta_description;
        $settings->site_address = $this->site_address;

        $save = $settings->save();

        if ($save) {

            //  $this->showToastr('success', 'created  new Site succefuly ');
            session()->flash('success', 'created  new Site succefuly');
        } else {
            //  $this->showToastr('error', 'created  new site faied ');
            session()->flash('success', 'created  new Site faied');
        }
    }

    public function updateSocialNetworks(Request $request)
    {
        $this->validate(['facebook_url' => 'required'], []);

        $socialnetworks = new SocialNetwork();
        // $socialnetworks->facebook_url = $request->get('facebook_url');
        $socialnetworks->facebook_url = $this->facebook_url;;
        $socialnetworks->twiter_url = $this->twiter_url;
        $socialnetworks->instgram_url = $this->instgram_url;
        $socialnetworks->github_url = $this->github_url;
        $socialnetworks->youtyope_url = $this->youtyope_url;
        $socialnetworks->linkedin_url = $this->linkedin_url;
        $save = $socialnetworks->save();
        if ($save) {
            // $this->showToastr('success', 'store  social networks links succefuly');
            session()->flash('success', 'store  social networks links succefuly');
        } else {
            session()->flash('success', 'store  social networks links faield');

            // $this->showToastr('error', 'store  social networks links faield');
        }
    }
    public function  showToastr($type, $message)
    {
        return $this->dispatchBrowserEvent('showToastr', ['type' => $type, 'message' => $message]);
    }
    public function render()
    {
        return view('livewire.admin-settings');
    }
}
