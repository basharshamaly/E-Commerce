<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::prefix('/admin')->name('admin.')->group(function () {

    Route::middleware(['auth:admin', 'preventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.admin.home')->name('home');
        Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_Handler'); // Moved here
        Route::get('/profile', [AdminController::class, 'profileView'])->name('profile');
        Route::post('/change-profile-picture', [AdminController::class, 'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'back.pages.admin.settings')->name('settings');
        Route::post('/change-site-logo', [AdminController::class, 'changeLogo'])->name('change-site-logo');
        Route::post('/change-site-favicon', [AdminController::class, 'changeFavIcon'])->name('change-site-favicon');
    });

    Route::middleware(['guest:admin', 'preventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');

        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_Handler');
        Route::view('/forgot-password', 'back.pages.admin.auth.forgot-password')->name('forgot-password');
        Route::get('/send-password-reset-link', [AdminController::class, 'SendPasswordResetLink'])->name('send-password-reset-link');
        Route::get('/password/reset/{token}', [AdminController::class, 'resetpassword'])->name('reset-password');
        Route::post('/reset-password-handler', [AdminController::class, 'resetPasswordHandler'])->name('reset-password-handler');
    });
});