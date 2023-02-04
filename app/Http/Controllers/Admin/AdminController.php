<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Validation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function accountPage()
    {
        return view('myViews.admin.adminDetail.detail');
    }

    public function passwordPage()
    {
        return view('myViews.admin.adminDetail.password');
    }

    public function editPage()
    {
        return view('myViews.admin.adminDetail.edit');
    }


    public function edit(Request $request)
    {
        dd($request->all());
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


}
