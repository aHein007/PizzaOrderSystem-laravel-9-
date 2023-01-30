<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listPage(){
        return view('myViews.admin.category.list');
    }
}
