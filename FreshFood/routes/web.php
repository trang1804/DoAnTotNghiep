<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\GroupUserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoriBlogController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\SessionController as AdminSessionController;

use App\Http\Controllers\Client\ClientController;
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



Route::name('cp-admin.')->prefix('cp-admin/')->group(function () {

    // category    
    Route::middleware('AdminLogin')->group(function () {
        Route::get('logout', [AdminSessionController::class, 'logout'])->name('logout');
        Route::get('profile', [UserController::class, 'proFile'])->name('profile');
        Route::post('profile', [UserController::class, 'proFileStore'])->name('proFileStore');
        Route::post('changePassword', [UserController::class, 'changePassword'])->name('changePassword');
        Route::get('config', [ConfigController::class, 'config'])->name('config');
        Route::post('config', [ConfigController::class, 'updateConfig'])->name('config');
    });
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
    //Nhân viên
    Route::name('user.')->middleware('AdminLogin')->prefix('user/')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
        Route::name('role.')->prefix('role/')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('index');
            Route::get('create', [RoleController::class, 'create'])->name('create');
            Route::post('store', [RoleController::class, 'store'])->name('store');
            Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
            Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });
    });
    // bài viết
    Route::name('cate_blog.')->prefix('cate_blog/')->group(function () {
        Route::get('', [CategoriBlogController::class, 'index'])->name('index');
        Route::get('create', [CategoriBlogController::class, 'create'])->name('create');
        Route::post('store', [CategoriBlogController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CategoriBlogController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoriBlogController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoriBlogController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
    });
    Route::name('blogs.')->prefix('blogs/')->group(function () {
        Route::get('', [BlogsController::class, 'index'])->name('index');
        Route::get('create', [BlogsController::class, 'create'])->name('create');
        Route::post('store', [BlogsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [BlogsController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [BlogsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BlogsController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
    });
});

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('products', [ClientController::class, 'products'])->name('products');
Route::get('product/{slug}', [ClientController::class, 'productDetail'])->name('product');
Route::get('blogs', [ClientController::class, 'blogs'])->name('blogs');
Route::get('blog/{slug}', [ClientController::class, 'blog'])->name('blog');
Route::get('cp-login', [AdminSessionController::class, 'create'])->name('login');
Route::post('cp-login', [AdminSessionController::class, 'store'])->name('submitLogin');
