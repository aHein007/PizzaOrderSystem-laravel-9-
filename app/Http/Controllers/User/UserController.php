<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homePage()
    {

        $pizza =Product::get();

        $category =Category::get();




        return view('myViews.user.home',compact('pizza','category'));
    }

    public function filterProcess($id)
    {
     $pizza=   Product::where('category_id',$id)->get();

     $category =Category::get();

     return view('myViews.user.home',compact('pizza','category'));


    }

    public function detailPage($id){

        $productDetail =Product::where('id',$id)->first();

        $pizzaList =Product::get();

        return view("myViews.user.productDetail",compact('productDetail','pizzaList'));
    }
}
