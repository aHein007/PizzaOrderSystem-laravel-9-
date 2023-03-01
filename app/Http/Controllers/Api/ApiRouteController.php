<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ApiRouteController extends Controller
{
    public function productList(){
        $products =Product::get();
        $users = User::get();

            $data =[
                'products' =>$products,
                'users' =>$users
            ];

            return response()->json($data,200);
    }

    public function categoryList(){
        $category =Category::get();
        $data =[
            'category' =>[
                'list' =>[
                    'items' =>$category
                ]
            ]
            ];
        return response()->json($data,200);
    }


    public function createCategory(Request $request){
        $data =[
            'name' =>$request->name,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()
        ];

        $response =Category::create($data);

        return response()->json($response,200);
    }


    public function createContact(Request $request){

       $getData= $this->getContact($request);

       $getData['email']= $request->email;

       $getData['message'] =$request->message;

        $contactRes =Contact::create($getData);

        return response()->json($contactRes,200);// ti show result in postman apk!
    }


    public function contactDelete($id){
       $data= Contact::where('id',$id)->first();

    //    return $data != null ? Contact::where('id',$request->category_id)->delete() : "Your items is not found!Try again later.";

       if($data != null){
        Contact::where('id',$id)->delete();

       return response()->json(['message'=>'contact delete successfully','delete items'=>$data],200);
       }else{
        return response()->json(['message'=>'Your items is not found! Try again later.'],404);
       }
    }

    public function detail($id){
            $data =Category::where('id',$id)->first();

        if($data != null){
            return response()->json(['message' =>'contact edit success','contact item' => $data],200);
        }else{
        return response()->json(['message'=>'Your items is not found! Try again later.'],500);
       }
    }

    public function updateCategory(Request $request){
        $data =$this->getContact($request);

       $getId = Category::where('id',$request->category_id)->first();

       $update =Category::where('id',$request->category_id)->update($data);

       $getUpdateData = Category::where('id',$request->category_id)->first();



    return   $getId == null ? response()->json(['message'=>'Your category not found to update'],500) :response()->json(['message'=>'Your category update successfully','data'=>$getUpdateData],200); $update;

       // return response()->json(['message'=>'Your category items is successfully!']);

    }




    private function getContact($request){
        $contact =[
            'name' =>$request->name,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()
        ];

        return $contact;
    }
}
// friend need is
// localhost:8000/api/productList
// localhost:8000/api/category/list
