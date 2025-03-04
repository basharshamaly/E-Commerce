<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function home(Request $request)
    {
        return view('back.pages.seller.home');
    }
    public function login(Request $request)
    {
        return view('back.pages.seller.auth.login');
    }
    public function register(Request $request)
    {
        return view('back.pages.seller.auth.register');
    }
}
