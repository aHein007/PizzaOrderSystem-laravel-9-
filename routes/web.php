<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//auth , login , logout
Route::middleware('admin_auth')->controller(AuthController::class)->group(function(){
    Route::redirect('/','/loginPage');
    Route::get('/loginPage','loginPage')->name('auth#loginPage');
    Route::get('/registerPage','registerPage')->name('auth#registerPage');
 });


Route::middleware('auth')->group(function () {

//user (or admin check page)
Route::get('/condition',[AuthController::class,'condition'])->name('condition');

    //admin //profile
Route::group(['prefix' => 'admin',['middleware'=>'admin_auth']],function(){
        //account
        Route::get('accountPage',[AdminController::class,'accountPage'])->name('admin#accountPage');
        Route::get('accountPage/editPage',[AdminController::class,'editPage'])->name('admin#editPage');
        Route::post('accountPage/editPage/edit/{id}',[AdminController::class,'edit'])->name('admin#edit');


        //password
        Route::get('passwordPage',[AdminController::class,'passwordPage'])->name('admin#passwordPage');
        Route::post('passwordPage/change',[AdminController::class,'changePassword'])->name('admin#changePassword');
    });

   //admin
 Route::group(['prefix' =>'category','middleware'=>'admin_auth'],function(){

    //category
    Route::get('/listPage',[CategoryController::class,'listPage'])->name('admin#listPage');
    Route::get('/page',[CategoryController::class,'categoryPage'])->name('admin#categoryPage');
    Route::post('/page/create',[CategoryController::class,'categoryCreate'])->name('admin#categoryCreate');
    Route::delete('/delete/{id}',[CategoryController::class,'categoryDelete'])->name('admin#categoryDelete');
    Route::get('/updatePage/{id}',[CategoryController::class,'categoryUpdatePage'])->name('admin#categoryUpdatePage');
    Route::post('/updatePage/update/{id}',[CategoryController::class,'categoryUpdate'])->name('admin#categoryUpdate');

});

Route::group(['prefix'=>'product','middleware' => 'admin_auth'],function(){
    Route::get('/page',[ProductController::class,'productPage'])->name("admin#productPage");
    Route::get('/page/createPage',[ProductController::class,'productCreatePage'])->name('admin#productCreatePage');
    Route::post('/page/createPage/create',[ProductController::class,'productCreate'])->name('admin#productCreate');
});


 //user
 Route::group(['prefix' => 'user','middleware' =>'user_auth'],function(){
    Route::get('home',function(){
        return view('myViews.user.home');
    })->name('user#home');
 });
});










