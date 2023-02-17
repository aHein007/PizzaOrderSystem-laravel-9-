<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCartPage($id)
    {
        $cartList =Cart::select('carts.*','products.name','products.price','products.image')->where('user_id',$id)
                                    ->leftJoin('products','carts.product_id','products.id')
                                    ->get();

        $totalPrice=0;

        foreach($cartList as $price){
            $totalPrice +=$price->price * $price->qty;
        }



        return view('myViews.user.cart',compact('cartList','totalPrice'));
    }
}
