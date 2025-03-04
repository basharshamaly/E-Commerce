<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\GeneralSetting;
use App\Models\SocialNetwork;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // مشاركة الإعدادات مع جميع القوالب
        View::composer('*', function ($view) {
            $view->with('settings', GeneralSetting::first());
            $socialnetworks = SocialNetwork::all()->pluck('url', 'platform')->toArray();
            // تخصيص الأسماء حسب الأعمدة
            $socialnetworks = [
                'facebook_url' => $socialnetworks['facebook_url'] ?? '',
                'twiter_url' => $socialnetworks['twiter_url'] ?? '',
                'instgram_url' => $socialnetworks['instgram_url'] ?? '',
                'githup_url' => $socialnetworks['githup_url'] ?? '',
                'youtyope_url' => $socialnetworks['youtyope_url'] ?? '',
                'linkedin_url' => $socialnetworks['linkedin_url'] ?? '',
            ];

            $view->with('socialnetworks', $socialnetworks);
        });

        require_once app_path('helper/helper.php');
    }
}