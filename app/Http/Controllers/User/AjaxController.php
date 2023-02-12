<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{



    public function pizzaList(Request $request)
    {//need $request (method) because url:'http://127.0.0.1:8000/user/ajax/pizzaList', will get from data;
       if($request->status == 'asc'){
             $product =Product::orderBy('created_at','asc')->get();
       }else{
            $product =Product::orderBy('created_at','desc')->get();
       }

        return $product;
    }
}
