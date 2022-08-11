<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\webAuthController;
use App\Http\Controllers\api\ForgotPasswordController;
use App\Http\Controllers\api\CodeCheckController;
use App\Http\Controllers\api\ResetPasswordController;
use App\Http\Controllers\webProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\webCustomerController;
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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/pages', function () {
    return view('test');
});
Route::get('/','webProductController@showtocustomer');

// Route::get('home', function () {
//     return view('auth.home');
// });

// Route::get('addproduct', function(){return view('addproduct');});

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
 //    Route::post('register',[AuthController::class,'register']);
 //   	Route::post('refresh',[AuthController::class,'refresh']);

 //  	Route::post('logout',[webAuthController::class,'logout'])->name('logout');

	// Route::get('Myinfo',[UserController::class,'myinfo']);
	// Route::get('AllUsersInfos',[UserController::class,'ViewAllUser']);

	// Route::post('v1/UpdateUserInfo',[AuthController::class,'updateMyInfo']);
	// Route::post('product/store',[webProductControlller::class,'store'])->name('addproduct');
	// Route::get('product/singleProduct/{id}',[webproductControlller::class,'index']);
	// Route::get('product/show',[webproductControlller::class,'show']);
	// Route::delete('product/delete/{id}',[webproductControlller::class,'destroy']);
	// Route::post('product/update/{id}',[webproductControlller::class,'update']);

Route::post('password/email',ForgotPasswordController::class);
Route::post('password/code/check',CodeCheckController::class);
Route::post('password/reset',ResetPasswordController::class);

Route::get('login','webAuthController@getLogin')->name('Login');
Route::post('login', 'webAuthController@postLogin')->name('adminLoginPost');
Route::post('admin/logout', 'webAuthController@logout')->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard','webAdminController@dashboard')->name('Admindashboard');

	//route of product form
	Route::get('product/store', 'webProductController@productform')->name('formproduct');

	//store product item
	Route::post('product/store','webProductController@store')->name('storeproduct');

	//form data store 
	Route::get('store/form','webAdminController@formslider')->name('formslider');

	//store sliders
	Route::post('store/slider','webAdminController@addSliders')->name('storeslider');

	//show all product
	Route::get('/product/show', 'webProductController@show')->name('showproduct');

	//delete product
	Route::get('/product/delete/{id}', 'webProductController@destroy');

});

//customer form register
Route::get('Create/account','webCustomerController@RegisterForm')->name('CustomerFormRegister');

//Cutomer create account
Route::post('Customer/create/account','webCustomerController@CreateAccount')->name('CustomerCreateAccount');

//Customer logout
Route::get('admin/logout', 'webCustomerController@logout')->name('customerlogout');

//Redirect new customer of registration
Route::get('New/customer/dashboard','webCustomerController@dashboard')->name('Newcustomerdashboard');

//customer routing
Route::group(['prefix' => 'customer','middleware' => 'customerauth'], function () {
	Route::get('dashboard','webCustomerController@dashboard')->name('customerdashboard');
	Route::get('Order','webCustomerController@ViewOrders')->name('ViewOrder');
	Route::get('order/product/{id}/{price}','webCustomerController@booking')->name('booking');
	Route::get('cancel/order/{id}','webCustomerController@CancelOrder');
});




