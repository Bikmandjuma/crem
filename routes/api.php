<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\ForgotPasswordController;
use App\Http\Controllers\api\CodeCheckController;
use App\Http\Controllers\api\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

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

	Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);  
   	Route::post('refresh',[AuthController::class,'refresh']);
   	
   	Route::post('/customer/booking/{id}',[App\Http\Controllers\CustomerController::class,'booking']);
   	Route::post('product/SingleProduct/{id}',[ProductController::class,'index']);
	Route::get('product/show',[ProductController::class,'show']);

Route::middleware('auth:api')->group(function () {
  	Route::get('logout',[AuthController::class,'logout']);
	Route::get('user/info',[UserController::class,'myinfo']);
	Route::post('update/user/info',[UserController::class,'updateInfo']);
	Route::post('product/store',[ProductController::class,'store']);
	Route::delete('product/delete/{id}',[ProductController::class,'destroy']);
	Route::post('product/update/{id}',[ProductController::class,'update']);
	Route::get('/customer/show/order',[App\Http\Controllers\CustomerController::class,'show']);
	

});

Route::post('password/email',  ForgotPasswordController::class);
Route::post('password/code/check', CodeCheckController::class);
Route::post('password/reset', ResetPasswordController::class);
