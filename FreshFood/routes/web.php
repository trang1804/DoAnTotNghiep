<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\GroupUserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SessionController as AdminSessionController;

use App\Http\Controllers\Client\HomeController;
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


Route::name('admin.')->prefix('admin/')->group(function () {
    Route::get('login', [UserController::class, 'getLoginAdmin'])->name('login');
    Route::post('login', [UserController::class, 'postLoginAdmin'])->name('submitLogin');

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('list', [SupplierController::class, 'getDanhSach']);

        Route::get('edit/{id}', [SupplierController::class, 'getSua']);
        Route::post('edit/{id}', [SupplierController::class, 'postSua']);

        Route::get('add', [SupplierController::class, 'getThem']);
        Route::post('add', [SupplierController::class, 'postThem']);

        Route::get('delete/{id}', [SupplierController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('list', [CategoryController::class, 'getDanhSach']);

        Route::get('edit/{id}', [CategoryController::class, 'getSua']);
        Route::post('edit/{id}', [CategoryController::class, 'postSua']);

        Route::get('add', [CategoryController::class, 'getThem']);
        Route::post('add', [CategoryController::class, 'postThem']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('list', [ProductController::class, 'getDanhSach']);

        Route::get('edit/{id}', [ProductController::class, 'getSua']);
        Route::post('edit/{id}', [ProductController::class, 'postSua']);

        Route::get('add', [ProductController::class, 'getThem']);
        Route::post('add', [ProductController::class, 'postThem']);

        // Route::post('search','ProductController@postSearch');

        Route::get('delete/{id}', [ProductController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'user'], function () {
        // Route::get('/','UserController@getDanhSach');
        Route::get('list', [UserController::class, 'getDanhSach'])->name('listUser');

        Route::get('edit/{id}', [UserController::class, 'getSua']);
        Route::post('edit/{id}', [UserController::class, 'postSua']);

        Route::get('add', [UserController::class, 'getThem']);
        Route::post('add', [UserController::class, 'postThem']);

        // Route::post('search','UserController@postSearch');
        Route::get('delete/{id}', [UserController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'post'], function () {
        Route::get('list', [PostController::class, 'getDanhSach']);

        Route::get('edit/{id}', [PostController::class, 'getSua']);
        Route::post('edit/{id}', [PostController::class, 'postSua']);

        Route::get('add', [PostController::class, 'getThem']);
        Route::post('add', [PostController::class, 'postThem']);

        Route::get('delete/{id}', [PostController::class, 'getXoa']);
    });

    Route::group(['prefix' => 'sale'], function () {
        Route::get('list', [SaleController::class, 'getDanhSach']);

        Route::get('edit/{id}', [SaleController::class, 'getSua']);
        Route::post('edit/{id}', [SaleController::class, 'postSua']);

        Route::get('add', [SaleController::class, 'getThem']);
        Route::post('add', [SaleController::class, 'postThem']);

        Route::get('delete/{id}', [SaleController::class, 'getXoa']);
    });
});

Route::name('cp-admin.')->prefix('cp-admin/')->group(function () {
    Route::get('login', [AdminSessionController::class, 'create'])->name('login');
    Route::post('login', [AdminSessionController::class, 'store'])->name('submitLogin');
    Route::get('logout', [AdminSessionController::class, 'logout'])->name('logout');
    Route::get('profile', [UserController::class, 'proFile'])->name('profile');
    Route::post('profile', [UserController::class, 'proFileStore'])->name('proFileStore');
    Route::post('changePassword', [UserController::class, 'changePassword'])->name('changePassword');

    // category    
    Route::name('category.')->middleware('AdminLogin')->prefix('category/')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
    // Sản phẩm
    Route::name('products.')->middleware('AdminLogin')->prefix('products/')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
    // Nhà cung câp
    Route::name('supplier.')->middleware('AdminLogin')->prefix('supplier/')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('create', [SupplierController::class, 'create'])->name('create');
        Route::post('store', [SupplierController::class, 'store'])->name('store');
        Route::get('edit/{id}', [SupplierController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [SupplierController::class, 'update'])->name('update');
        Route::get('delete/{id}', [SupplierController::class, 'delete'])->name('delete');
    });
      // nhom khách hàng
    Route::name('groups.')->middleware('AdminLogin')->prefix('groups/')->group(function () {
        Route::get('', [GroupUserController::class, 'index'])->name('index');
        Route::get('create', [GroupUserController::class, 'create'])->name('create');
        Route::post('store', [GroupUserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [GroupUserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [GroupUserController::class, 'update'])->name('update');
        Route::get('delete/{id}', [GroupUserController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
    });
        // khách hàng
    Route::name('customers.')->middleware('AdminLogin')->prefix('customers/')->group(function () {
        Route::get('', [CustomerController::class, 'index'])->name('index');
        Route::get('create', [CustomerController::class, 'create'])->name('create');
        Route::post('store', [CustomerController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CustomerController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CustomerController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
