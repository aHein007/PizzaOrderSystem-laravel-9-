<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homePage()
    {
        $pizza =Product::get();

        $category =Category::get();


        return view('myViews.user.home',compact('pizza','category'));
    }
}
