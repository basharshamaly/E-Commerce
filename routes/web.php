<?php

use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/bage/example/', function () {
    return view('page-example');
});
Route::view('/auth/example/', 'auth-example');






//front end routes

Route::controller(FrontController::class)->group(function () {

    Route::get('/', 'homepage')->name('front.home');
});

Route::view('/example', 'example');
Route::view('/Home', 'front.layout.pages-layout');
