<?php

use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/seller')->name('seller.')->group(function () {
    Route::middleware(['guest:seller,preventBackHistory'])->group(function () {
        Route::controller(SellerController::class)->group(function () {
            Route::get('/login', 'login')->name('login'); // Corrected from 'logins' to 'login'
            Route::post('/login_handler', 'loginHandler')->name('login-handler');
            Route::get('/register', 'register')->name('register');
            Route::post('/create/seller', 'createSeller')->name('createSeller');
            Route::get('/account/virefy/{token}', 'VirefyAccount')->name('virefy');
            Route::get('/register/success', 'registerSuccess')->name('registerSuccess');
        });
    });

    Route::middleware(['auth:seller,preventBackHistory'])->group(function () {
        Route::controller(SellerController::class)->group(function () {
            Route::get('/', 'home')->name('home');
            Route::post('/logout', 'logout')->name('logout');
        });
    });
});
