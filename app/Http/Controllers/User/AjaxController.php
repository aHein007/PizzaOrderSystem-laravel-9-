<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
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

       return response()->json($product,200);
    }


    public function addCart(Request $request)
    {

      $orderData =  $this->getOrderData($request);
        Cart::create($orderData);

        $response = [
            'status' => 'success',
            'message' => 'Add to cart complete!'
        ];

        return response()->json($response,200);// this is important

    }

    private function getOrderData($request)
    {
        return [
            'user_id' =>$request->userId,
            'product_id' =>$request->productId,
            'qty' =>$request->count,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
    }
}
