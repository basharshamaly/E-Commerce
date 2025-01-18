<?php

use App\Http\Controllers\Admin\CategoryController;
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

        //routes category

        Route::prefix('category')->name('category.')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/', 'catSubCatList')->name('cat-sub-cat-list');
                Route::get('/add-category', 'addCategory')->name('add-category');
                Route::post('/store-category', 'storeCategory')->name('store-category');
                Route::get('/edit-category/{id}', 'editCategory')->name('edit-category');
                Route::put('/update-category/{id}', 'updateCategory')->name('update-category');

                //routes sub categories
                Route::get('/add-subcategory', 'addSubCategory')->name('add-subcategory');
                Route::post('/store-subcategory', 'storeSubCategory')->name('store-subcategory');
            });
        });
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