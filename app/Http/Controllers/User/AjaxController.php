<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

       $orderData =$this->getOrderData($request);


        Cart::create($orderData);

        $response = [
            'message' => 'Add to cart product successfully!',
            'status' => 'success'
        ];

        return response()->json($response,200); // this is important




    }

    public function order(Request $request)
    {
        $total = 0;
       foreach ($request->all() as $item) {
        $orderList = OrderList::create([
            'user_id' => $item['user_id'],
            'product_id' =>$item['product_id'],
            'order_code' =>$item['order_code'],
            'qty' =>$item['qty'],
            'total' =>$item['total'],

        ]);

        $total +=$orderList->total; /// add for total Price
    }

        logger($orderList->total);
        Cart::where('user_id',Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' =>$orderList->order_code,
            'total-price' =>$total + 3000

        ]);

       $response = [
        'message' => 'Order Create Successfully!',
        'status' => 'success'
        ];




       return response()->json($response,200);
    }


    private function getOrderData($request){
        return [
            'user_id' =>$request->userId,
            'qty' =>$request->count,
            'product_id' =>$request->productId
        ];
    }


}
