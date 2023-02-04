<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Validation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

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


    public function edit(Request $request,$id)
    {

        $file =$request->file('image');

        $imageName =uniqid() .'_aung_'. $file->getClientOriginalName();


        //old image delete
        $this->oldImage($id);

        //store image 
        $storeImage = $file->storeAs('public',$imageName);

        $profile =$this->updateProfile($request,$imageName);

       User::where('id',$id)->update($profile);
    }


    private function updateProfile($request,$imageName)
    {
        return [
            'name'=>$request->name,
            'email' =>$request->email,
            'image' =>$imageName,
            'phone' =>$request->phone,
            'gender' =>$request->gender,
            'address' =>$request->address
        ];
    }


    private function oldImage($id)
    {
        $oldImage =User::select('image')
                        ->where('id',$id)
                        ->first();

        if(isset($oldImage['image']) || $oldImage['image'] == null){ //this is so important code
            Storage::delete('public/' . $oldImage['image'] );
        }
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
