<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductValidation;

class ProductController extends Controller
{

    public function productPage(Request $request)
    {


       $dataProduct = Product::productSearch($request->searchProduct)
                            ->orderBy('created_at','desc')
                            ->paginate(3);


        $dataProduct->appends($request->all());

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

    public function updatePage()
    {
       return view("myViews.admin.product.productEdit");
    }


    public function productDelete($id)
    {
        $productImage =Product::select('image')->where('id',$id)->first();

        if($productImage['image'])
        {
            Storage::delete('public/productImage/' . $productImage['image']);
        };

        Product::where('id',$id)->delete();

        return redirect()->route("admin#productPage")->with('productDelete','Your product have been delete!');
    }

    public function detailPage($id)
    {
        $productItems =Product::where('id',$id)->first();
        
        return view('myViews.admin.product.productDetail',compact('productItems'));
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
