<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.register');
});
Auth::routes();
//Admin
route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::resource('/orders', 'OrderController');
    Route::resource('/products', 'ProductController');
    Route::resource('/suppliers', 'SupplierController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UserController');
    Route::resource('/transactions', 'TransactionController');
    Route::resource('/companies', 'CompanyController');
    Route::resource('/customers', 'CustomerController');
});
Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'index']);

route::middleware(['auth:sanctum', 'verified'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


