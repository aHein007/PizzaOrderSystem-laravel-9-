<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listPage(Request $request){



       $categoryData = Category::search($request->search)
                                ->orderBy('id','desc')
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

        $dataCategory =  $this->categoryData($request);

       Category::create($dataCategory);

        return redirect()->route('admin#listPage')->with('createCategory','Your category create have been successfully!');
    }

    public function categoryDelete($id)
    {
        Category::where('id',$id)->delete();

        return redirect()->route('admin#listPage')->with('deleteCategory','Your category had been delete!');
    }


    public function categoryUpdatePage($id)
    {



     $category =  Category::where('id',$id)
                                ->first();


    return view('myViews.admin.category.update',compact('category'));

    }


    public function categoryUpdate(Request $request,$id)
    {
        $this->categoryUpdateValidation($request,$id);

      $updateData = $this->categoryData($request);

       Category::where("id",$id)->update($updateData);

       return redirect()->route('admin#listPage')->with('update','Your Category updated successfully!');
    }

    private function categoryData($request)
    {
        $data =[
            'name' => $request->categoryName
          ];

        return $data;
    }

    private function categoryUpdateValidation($request,$id)
    {
        Validator::make($request->all(),[
            'categoryName' =>'required|unique:categories,name,' . $id
        ],[
            'categoryName.required' =>'You need to fill the category name!'
        ])->validate();
    }



    private function categoryValidation($request)
    {
        Validator::make($request->all(),[
            'categoryName' =>'required|unique:categories,name'
        ],[
            'categoryName.required' =>'You need to fill the category name!'
        ])->validate();
    }
}
