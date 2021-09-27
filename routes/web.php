<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Users\LoginController;
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

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #menu
        Route::prefix('menu')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #san pham
        
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
        });

        #Slider
        
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
        });


        #News
        Route::prefix('news')->group(function () {
            Route::get('add', [NewsController::class, 'create']);
            Route::post('add', [NewsController::class, 'store']);
            Route::get('list', [NewsController::class, 'index']);
            Route::DELETE('destroy', [NewsController::class, 'destroy']);
            Route::get('edit/{news}', [NewsController::class, 'show']);
            Route::post('edit/{news}', [NewsController::class, 'update']);
        });

        #cart
        Route::get('customer', [CartController::class, 'index']);
        Route::get('customer/view/{customer}', [CartController::class, 'show']);


        #upload
        Route::post('upload/services', [UploadController::class, 'store']);

    });
});

Route::get('/',[App\Http\Controllers\MainController::class, 'index']);

Route::get('/san-pham/{product}',[App\Http\Controllers\ProductController::class, 'index']);

Route::get('/danh-muc/{menu}',[App\Http\Controllers\ShopController::class, 'index']);
Route::get('/all/',[App\Http\Controllers\ShopController::class, 'show']);


Route::post('add-cart',[App\Http\Controllers\CartController::class, 'index']);
Route::get('carts',[App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart',[App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}',[App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts',[App\Http\Controllers\CartController::class, 'addCart']);

Route::get('/news',[App\Http\Controllers\NewsController::class, 'index']);
Route::get('/news/post/{news}',[App\Http\Controllers\NewsController::class, 'show']);

