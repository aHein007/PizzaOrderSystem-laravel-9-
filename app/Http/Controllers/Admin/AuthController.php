<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login page
    public function loginPage()
    {
        return view('myViews.login');
    }

    public function passwordPage()
    {
        return view('myViews.admin.adminPassword.password');
    }


    public function changePassword(Validation $request)
    {
       $currentUserId =Auth::user()->id;
        $user = User::select('password')
                    ->where('id',$currentUserId)
                    ->first();

        $oldHashPassword =$user->password;

        $hashNewPassword = Hash::make($request->newPassword);

        if(Hash::check($request->oldPassword,$oldHashPassword)){
                User::where('id',$currentUserId)->update([
                    'password' => $hashNewPassword
                ]);

                Auth::logout();
                return redirect()->route('auth#loginPage');
        }else
        {
                return back()->with('password','Your old password need to match with our record!');
        }


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
