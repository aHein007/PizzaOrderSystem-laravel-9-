<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListInUser extends Controller
{
    public function listPage(Request $request){

        $search =$request->search_user;

        $userList =User::where('role','user')
                        ->where(function($query) use ($search){
                            $query->orWhere('name','like','%'.$search.'%')
                                  ->orWhere('email','like','%'.$search.'%')
                                  ->orWhere('phone','like','%'.$search.'%')
                                  ->orWhere('address','like','%'.$search.'%');
                        })->paginate(2);


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
