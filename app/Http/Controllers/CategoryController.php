<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listPage(){
       $categoryData = Category::orderBy('category_id','desc')->get();



        return view('myViews.admin.category.list',compact('categoryData'));
    }

    public function categoryPage(){
        return view("myViews.admin.category.create");
    }

    public function categoryCreate(Request $request)
    {

        $this->categoryValidation($request);

       $data =[
         'name' => $request->categoryName
       ];

        Category::create($data);

        return redirect()->route('admin#listPage');
    }


    public function categoryValidation($request)
    {
        Validator::make($request->all(),[
            'categoryName' =>'required|unique:categories,name'
        ],[
            'categoryName.required' =>'You need to fill the category name!'
        ])->validate();
    }
}
