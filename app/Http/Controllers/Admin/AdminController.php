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
use Illuminate\Support\Facades\Validator;

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

        $this->updateValidation($request);

        $profile =$this->updateProfile($request);


      if($request->hasFile('image')){//this is so important ,
          //get image from request
          $file =$request->file('image');//this is so important ,

          //make uniqid photo name
          $imageName =uniqid() .'_aung_'. $file->getClientOriginalName();

           //store image
           $storeImage = $file->storeAs('public',$imageName);


          //old image delete
          $this->oldImage($id,$request);

          $profile['image']=$imageName;
      }






       User::where('id',$id)->update($profile);

       return redirect()->route('admin#accountPage')->with('updateSuccess','Profile updated successfully!');
    }


    private function updateProfile($request)
    {



        return [
            'name'=>$request->name,
            'email' =>$request->email,
            'image' =>$request->image,
            'phone' =>$request->phone,
            'gender' =>$request->gender,
            'address' =>$request->address
        ];
    }


    private function oldImage($id,$request)
    {

        $oldImage =User::select('image')
        ->where('id',$id)
        ->first();

        if(isset($oldImage['image'])){ //this is so important code
            Storage::delete('public/' . $oldImage['image'] );
        }

    }

    private function updateValidation($request)
    {
        Validator::make($request->all(),[
            'name' =>'required',
            'email' =>'required|email',
            'gender' =>'required',
            'phone' =>'required|max:15',
            'address' =>'required',
            'image' =>'mimes:jpg,jpeg,png'
        ],[

        ])->validate();
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
