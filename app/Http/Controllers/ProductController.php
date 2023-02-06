<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidation;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productPage()
    {
       $dataProduct = Product::orderBy('id','desc')->paginate(3);
        return view('myViews.admin.product.product',compact('dataProduct'));
    }

    public function productCreatePage()
    {
       $category = Category::select('id','name')->get();

        return view('myViews.admin.product.productCreate',compact('category'));
    }

    public function productCreate(ProductValidation $request)
    {
       $productData = $this->createData($request);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $imageName = uniqid() ."_". $file->getClientOriginalName();

            $storeImage =$file->storeAs('public/productImage',$imageName);
            $productData['image'] =$imageName;


        }

        Product::create($productData);

        return redirect()->route('admin#productPage')->with('productCreate','Your product create successfully!');

    }


    private function createData($request)
    {
        return [
            'name'=> $request->productName,
            'price' =>$request->productPrice,
            'category_id' =>$request->category,
            'waiting_time' =>$request->waitingTime,
            'description' =>$request->description
        ];
    }

}
