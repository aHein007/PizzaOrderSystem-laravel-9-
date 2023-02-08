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
                            ->select('products.*','products.name','products.category_id','categories.name as category_name')// သူ ကို ပါ("products")
                            ->leftJoin('categories','categories.id','products.category_id')
                            ->orderBy('products.created_at','desc')
                            ->paginate(3);

        //data  တေ ကို join ထားတဲ့ table data ရဲ့ data အဖြစ် ပြန် ပြောင်း ပေး ရပါ တယ


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

    public function updatePage($id)
    {
        $product =Product::where('id',$id)->first();

        $categoryData=Category::select('id','name')->get();
        

       return view("myViews.admin.product.productEdit",compact('product','categoryData'));
    }

    public function update(ProductValidation $request,$id)
    {
      $updateData=  $this->createData($request);

     $deletePhoto =   $this->updatePhotoDelete($id);



      if($request->hasFile('image'))
      {
        $file =$request->file('image');

        $newImagePhoto =uniqid() ."_". $file->getClientOriginalName();

        $file->storeAs('public/productImage/', $newImagePhoto);

        $updateData['image'] =$newImagePhoto;


      }

        Product::where('id',$id)->update($updateData);

        return redirect()->route('admin#productPage')->with('productUpdate','Your product have been update!');
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
        $productItems =Product::select('products.*','products.name','products.category_id','categories.name as category_name')->where('products.id',$id)
                    ->leftJoin('categories','categories.id','products.category_id')
                    ->first();



        return view('myViews.admin.product.productDetail',compact('productItems'));
    }


    private function updatePhotoDelete($id)
    {
        $oldImagePhoto =Product::select('image')
                                ->where('id',$id)
                                ->first();

        if($oldImagePhoto['image'] != null )
        {
            Storage::delete('public/productImage/'. $oldImagePhoto['image']);
        }
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
