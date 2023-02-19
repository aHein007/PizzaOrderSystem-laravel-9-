<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function homePage()
    {

        $pizza =Product::get();

        $category =Category::get();

        $cart =Cart::where('user_id',Auth::user()->id)->get(); // this is important!

        $orderHistory =Order::get();


        return view('myViews.user.home',compact('pizza','category','cart','orderHistory'));
    }

    public function filterProcess($id)
    {
     $pizza=   Product::where('category_id',$id)->get();

     $category =Category::get();

     $cart =Cart::where('user_id',Auth::user()->id)->get();

     $orderHistory =Order::get();

     return view('myViews.user.home',compact('pizza','category','cart','orderHistory'));


    }

    public function historyPage(){
        $orderList =Order::where('user_id',Auth::user()->id)->paginate(8);
         return view('myViews.user.history',compact('orderList'));
    }

    public function detailPage($id){

        $productDetail =Product::where('id',$id)->first();

        $pizzaList =Product::get();

        return view("myViews.user.productDetail",compact('productDetail','pizzaList'));
    }


}
