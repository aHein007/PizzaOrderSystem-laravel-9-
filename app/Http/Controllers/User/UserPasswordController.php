<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordValidation;
use Illuminate\Support\Facades\Hash;

class UserPasswordController extends Controller
{
    public function passwordPage()
    {
        return view('myViews.user.password.passwordPage');
    }


    public function passwordChange(UserPasswordValidation $request,$id)
    {
      $getOldPassword = User::select('password')
                    ->where('id',$id)
                    ->first();

        $oldPassword =$getOldPassword->password;

        $newUserPassword =Hash::make($request->passwordNew);

        if(Hash::check($request->passwordOld,$oldPassword)){
            User::where('id',$id)->update([
                'password' => $newUserPassword
            ]);
            return back()->with('changePassword','You password change successfully!');
        }else{
            return back()->with('noSameOldPassword','Your old password do not match our record!');
        }
    }
}
