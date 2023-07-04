<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/users', UserController::class);
Route::get('/users/{user}/delete', [UserController::class, 'destroy']);
Route::get('/users/{user}/change-password', [UserController::class, 'passwordForm']);
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword']);
Route::resource('/users/{user}/addresses', AddressController::class);
Route::get('users/{user}/addresses/{address}/delete', [AddressController::class, 'destroy']);
Route::resource('/categories', CategoryController::class);
Route::get("categories/{category}/delete", [CategoryController::class, 'destroy']);
Route::resource('/products', ProductController::class);
Route::get("products/{product}/delete", [ProductController::class, 'destroy']);
Route::resource("products/{product}/images", ProductImageController::class);
Route::get("products/{product}/images/{image}/delete", [ProductImageController::class, 'destroy']);







