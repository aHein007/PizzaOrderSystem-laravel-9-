<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListInUser extends Controller
{
    public function listPage(){
        $userList =User::where('role','user')->get();

        return view('myViews.admin.userList.userList',compact('userList'));
    }

    public function changeAdmin(Request $request){
      
        User::where('id',$request->userId)->update([
            'role' =>$request->value
        ]);

        return response()->json([
            'status' =>'success'
        ],200);
    }
}
