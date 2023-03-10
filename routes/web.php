<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AdminListInUser;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPasswordController;
use App\Http\Controllers\User\UserProfileController;
use App\Models\Product;
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


        //admin list
        Route::get('/adminListPage',[AdminController::class,'adminListPage'])->name('admin#adminListPage');
        Route::delete('/delete/{id}',[AdminController::class,'adminDelete'])->name('admin#adminDelete');
        Route::get('/changeRole',[AjaxController::class,'changeRole'])->name('admin#changeRolePage');

        //password
        Route::get('passwordPage',[AdminController::class,'passwordPage'])->name('admin#passwordPage');
        Route::post('passwordPage/change',[AdminController::class,'changePassword'])->name('admin#changePassword');

        Route::prefix('order')->group(function(){
            Route::get('page',[OrderController::class,'orderPage'])->name('admin#orderPage');
            Route::post('change/status',[OrderController::class,'changeSorting'])->name('admin#sorting');
            Route::get('ajax/changeStatus',[OrderController::class,'changeStatus'])->name('admin#changeStatus');
            Route::get('orderDetail/{code}',[OrderController::class,'orderDetail'])->name('admin#orderDetail');
        });


        Route::prefix('contact')->group(function(){
            Route::get('/page',[ContactController::class,'contactPage'])->name('admin#contactPage');

        });
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
    Route::get('/createPage',[ProductController::class,'productCreatePage'])->name('admin#productCreatePage');
    Route::post('/createPage/create',[ProductController::class,'productCreate'])->name('admin#productCreate');
    Route::get('/updatePage/{id}',[ProductController::class,'updatePage'])->name('admin#updatePage');
    Route::post('/updatePage/update/{id}',[ProductController::class,'update'])->name('admin#update');
    Route::delete('/delete/{id}',[ProductController::class,'productDelete'])->name('admin#productDelete');
    Route::get('/detailPage/{id}',[ProductController::class,'detailPage'])->name('admin#detailPage');
});

Route::prefix('adminListInUser')->group(function(){
    Route::get('/listPage',[AdminListInUser::class,'listPage'])->name('admin#adminListInUser');
    Route::get('/changeAdmin',[AdminListInUser::class,'changeAdmin'])->name('admin#changeAdmin');
    Route::delete('/deleteUser/{id}',[AdminController::class,'deleteUser'])->name('admin#userDelete');
});

 //user
 Route::group(['prefix' => 'user','middleware' =>'user_auth'],function(){
    //user page
   Route::get('home',[UserController::class,'homePage'])->name('user#home');

   Route::prefix('pizza')->group(function(){
        Route::get('detail/{id}',[UserController::class,'detailPage'])->name('user#detailPage');
        Route::get('addCartPage/{id}',[CartController::class,'addCartPage'])->name('user#addCartPage');
        Route::get('historyPage',[UserController::class,'historyPage'])->name('user#history');

   });

   //filter category
   Route::get('category/filter/{id}',[UserController::class,'filterProcess'])->name('users#filterProcess');

   //ajax method route // cart process
        Route::prefix('ajax')->group(function(){ //this is important code
      Route::get('pizzaList',[AjaxController::class,'pizzaList'])->name('user#pizzaList');
      Route::get('addCart',[AjaxController::class,'addCart'])->name('user#addCart');
      Route::get('countView',[AjaxController::class,'countView'])->name('user#countView');
      //order process
      Route::get('order',[AjaxController::class,'order'])->name('user#order');
      Route::get('clearCart',[AjaxController::class,'clearCart'])->name('user#clearCart');
      Route::get('clearOneCart',[AjaxController::class,'clearByOne'])->name('user#clearByOne');
   });

   //user profile
   Route::prefix('profile')->group(function(){
     Route::get('profilePage/{id}',[UserProfileController::class,'profilePage'])->name('user#profilePage');
    Route::post('updateProfile/{id}',[UserProfileController::class,'update'])->name('user#updateProfile');
   });

   //user password
   Route::prefix('password')->group(function(){
        Route::get('passwordPage',[UserPasswordController::class,'passwordPage'])->name('user#passwordPage');
        Route::post('changePassword/{id}',[UserPasswordController::class,'passwordChange'])->name('user#passwordChange');
   });

   Route::prefix('userContact')->group(function(){
    Route::get('/page',[ContactController::class,'contact'])->name('user#contactPage');
    Route::post('/contact/{id}',[ContactController::class,'sendContact'])->name('user#sendContact');
   });
 });
});










