<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listPage(Request $request){



       $categoryData = Category::search($request->search)
                                ->orderBy('category_id','desc')
                                ->paginate(4);

        $categoryData->appends($request->all());//this appends method is still work all(search & paginate) when data searching



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

        return redirect()->route('admin#listPage')->with('createCategory','Your category create have been successfully!');
    }

    public function categoryDelete($id)
    {
        Category::where('category_id',$id)->delete();

        return redirect()->route('admin#listPage')->with('deleteCategory','Your category had been delete!');
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
