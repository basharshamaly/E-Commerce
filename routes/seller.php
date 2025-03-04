<?php

use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

Route::prefix('/seller')->name('seller.')->group(function () {
    Route::middleware(['guest:seller'])->group(function () {
        Route::controller(SellerController::class)->group(function () {
            Route::get('/login', 'login')->name('login'); // Corrected from 'logins' to 'login'
            Route::get('/register', 'register')->name('register');
        });
    });

    Route::middleware([])->group(function () {
        Route::controller(SellerController::class)->group(function () {
            Route::get('/', 'home')->name('home');
        });
    });
});