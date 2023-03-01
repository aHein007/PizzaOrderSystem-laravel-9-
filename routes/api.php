<?php

use App\Http\Controllers\Api\ApiRouteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get
Route::get('/productList',[ApiRouteController::class,'productList']);
Route::get('/category/list',[ApiRouteController::class,'categoryList']);


//post
Route::post('create/category',[ApiRouteController::class,'createCategory']);// ဒီ url links ကို post man က နေ send လုပ် ရင် create လုပ်သွား ပါ မယ်။
Route::post('create/contact',[ApiRouteController::class,'createContact']);

Route::get('contact/delete/{id}',[ApiRouteController::class,'contactDelete']);
Route::get('category/detail/{id}',[ApiRouteController::class,'detail']);
Route::post('category/update',[ApiRouteController::class,'updateCategory']);
