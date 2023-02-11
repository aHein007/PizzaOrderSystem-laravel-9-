<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function profilePage($id)
    {
       $userData = User::where('id',$id)->first();
        return view('myViews.user.userProfile.profilePage',compact('userData'));

    }


    public function update(Request $request,$id)
    {
        $this->updateValidation($request);

        $this->deleteImage($id);

       $profile = $this->updateData($request);





       if($request->hasFile('image'))
       {
            $file =$request->file('image');
             $imageName =uniqid() ."aung". $file->getClientOriginalName();

             $storeImage = $file->storeAs('public',$imageName);
             $profile['image'] =$imageName;

       }


       User::where('id',$id)->update($profile);

       return back()->with('updateSuccess','You profile update successfully!');
    }

    public function updateData($request)
    {
        return [
            'name' =>$request->name,
            'email' =>$request->emailj,
            'gender' =>$request->gender,
            'phone' =>$request->phone,
            'address' =>$request->address,
            'image' =>$request->image
        ];
    }


    public function deleteImage($id)
    {
        $getOldImage =User::select('image')->where('id',$id)->first();



       if(isset($getOldImage['image']))
       {
            Storage::delete("public/" . $getOldImage['image']);
       }
    }

    public function updateValidation($request)
    {
        Validator::make($request->all(),[
            'name' =>'required',
            'email'=>'required|email',
            'gender' =>'required',
            'phone'=>'required',
            'address' =>'required',
            'image' =>'mimes:jpg,jpeg,png'
        ],[
            'name.required' =>'You need to fill the name!',
            'email.required' =>'You need to fill the email!',
            'gender.required' =>'You need to fill the gender!',
            'phone.required' =>'You need to choose the phone!',
            'address.required' =>'You need to fill the address!',

        ])->validate();
    }
}
