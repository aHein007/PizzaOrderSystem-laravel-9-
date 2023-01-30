<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login page
    public function loginPage()
    {
        return view('myViews.login');
    }

    //register page
    public function registerPage()
    {
        return view('myViews.register');
    }

    public function condition(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#listPage');
        }else
        {
            return redirect()->route('user#home');
        }
    }
}
