<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;

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

// Client
Route::get('/', function () {
    return view('client/layout/newPro');
});

// --Admin
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');

Route::group(['prefix'=>'admin'],function ()
{
    Route::group(['prefix'=>'supplier'],function ()
    {
        Route::get('list',[SupplierController::class,'getDanhSach']);

        Route::get('edit/{id}',[SupplierController::class,'getSua']);
        Route::post('edit/{id}',[SupplierController::class,'postSua']);

        Route::get('add',[SupplierController::class,'getThem']);
        Route::post('add',[SupplierController::class,'postThem']);

        Route::get('delete/{id}',[SupplierController::class,'getXoa']);
    });

    Route::group(['prefix'=>'category'],function ()
    {
        Route::get('list',[CategoryController::class,'getDanhSach']);

        Route::get('edit/{id}',[CategoryController::class,'getSua']);
        Route::post('edit/{id}',[CategoryController::class,'postSua']);

        Route::get('add',[CategoryController::class,'getThem']);
        Route::post('add',[CategoryController::class,'postThem']);
    });

    Route::group(['prefix'=>'product'],function ()
    {
        Route::get('list',[ProductController::class,'getDanhSach']);

        Route::get('edit/{id}',[ProductController::class,'getSua']);
        Route::post('edit/{id}',[ProductController::class,'postSua']);

        Route::get('add',[ProductController::class,'getThem']);
        Route::post('add',[ProductController::class,'postThem']);

        // Route::post('search','ProductController@postSearch');

        Route::get('delete/{id}',[ProductController::class,'getXoa']);
    });

    Route::group(['prefix'=>'user'],function ()
    {
        // Route::get('/','UserController@getDanhSach');
        Route::get('list',[UserController::class,'getDanhSach'])->name('listUser');
        
        Route::get('edit/{id}',[UserController::class,'getSua']);
        Route::post('edit/{id}',[UserController::class,'postSua']);

        Route::get('add',[UserController::class,'getThem']);
        Route::post('add',[UserController::class,'postThem']);

        // Route::post('search','UserController@postSearch');
        Route::get('delete/{id}',[UserController::class,'getXoa']);
    });

    Route::group(['prefix'=>'post'],function ()
    {
        Route::get('list',[PostController::class,'getDanhSach']);

        Route::get('edit/{id}',[PostController::class,'getSua']);
        Route::post('edit/{id}',[PostController::class,'postSua']);

        Route::get('add',[PostController::class,'getThem']);
        Route::post('add',[PostController::class,'postThem']);

        Route::get('delete/{id}',[PostController::class,'getXoa']);
    });

    Route::group(['prefix'=>'sale'],function ()
    {
        Route::get('list',[SaleController::class,'getDanhSach']);

        Route::get('edit/{id}',[SaleController::class,'getSua']);
        Route::post('edit/{id}',[SaleController::class,'postSua']);

        Route::get('add',[SaleController::class,'getThem']);
        Route::post('add',[SaleController::class,'postThem']);

        Route::get('delete/{id}',[SaleController::class,'getXoa']);
    });
});
