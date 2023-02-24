<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderPage(Request $request){
        $orderList =Order::select('orders.*','users.name as userName')
                            ->leftJoin('users','users.id','orders.user_id')
                            ->searchOrder($request->search)
                            ->orderBy('created_at','desc')
                            ->paginate(5);


        $orderList->appends($request->all());


        return view('myViews.admin.order.order',compact('orderList'));
    }

    public function changeSorting(Request $request){

        $orderList =Order::select('orders.*','users.name as userName')
                            ->leftJoin('users','users.id','orders.user_id')
                            ->searchOrder($request->search)
                            ->orderBy('created_at','desc');

        if($request->filterStatus == 'all'){
           $orderList= $orderList->paginate(5);
        }else{
            $orderList =$orderList->orWhere('orders.status',$request->filterStatus)->paginate(5);
        }


        $orderList->appends($request->all());

        return view('myViews.admin.order.order',compact('orderList'));
    }

    public function changeStatus(Request $request){
        $orderId =$request->orderId;
        $state =$request->currentState;

        $orderList =Order::select('orders.*','users.name as userName')
                ->leftJoin('users','users.id','orders.user_id')
                ->searchOrder($request->search)
                ->orderBy('created_at','desc')
                ->paginate(5);

        Order::where('id',$orderId)->update([
            'status' => $state
        ]);

        return response()->json([
            'status'=>'success'
        ],200);
    }


    public function orderDetail($code)
    {
        $orderDetail =OrderList::select('order_lists.*','products.name as productName','products.image','users.name as userName')
                                ->leftJoin('products','products.id','order_lists.product_id')
                                ->leftJoin('users','users.id','order_lists.user_id')
                                ->where('order_code',$code)
                                ->get();


        return view('myViews.admin.order.orderDetail',compact('orderDetail'));
    }
}
