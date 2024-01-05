<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\C_conversationController;

use App\Http\Controllers\PurchaseController;




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
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

// Route::get('/service', function () {
//     return 'Hello World';
// });

// Route::get('user/show', [UserController::class,'show']);

//Route::get("user/create",[UserController::class,'create']);
//Route::post("user/save",[UserController::class,'save'])->name("user/save");

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::get("getcustomers",[CustomerController::class,'get_customer_json']);
Route::resource('services', ServiceController::class);
Route::get("getservice",[ServiceController::class,'get_service_json']);
Route::resource('orders', OrderController::class);
Route::resource("c_conversations",C_conversationController::class);
Route::resource("purchases",PurchaseController::class);
Route::get("update-status",[OrderController::class,'updateStatus'])->name('update.status');

Route::post("auth",[AuthController::class,'auth'])->name('auth');
Route::get("home",[HomeController::class,'index'])->name('home');


