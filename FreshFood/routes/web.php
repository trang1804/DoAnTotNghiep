<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboadContrller;
use App\Http\Controllers\Admin\GroupUserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoriBlogController;
use App\Http\Controllers\Admin\ContactContrller;
use App\Http\Controllers\Admin\OrderContrller;
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

Route::get('cp-login', [AdminSessionController::class, 'create'])->name('login');
Route::post('cp-login', [AdminSessionController::class, 'store'])->name('submitLogin');
Route::get('cp-register', [ClientController::class, 'register'])->name('register');
Route::post('cp-register', [ClientController::class, 'registerCreate'])->name('registerCreate');

Route::name('cp-admin.')->middleware('AdminLogin')->prefix('cp-admin/')->group(function () {
    Route::get('/}', [DashboadContrller::class, 'index'])->name('dashboad');
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
    Route::name('contact.')->prefix('contact/')->group(function () {
        Route::get('', [ContactContrller::class, 'index'])->name('index');
        Route::get('edit/{id}', [ContactContrller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ContactContrller::class, 'update'])->name('update');
    });
    Route::name('orders.')->prefix('orders/')->group(function () {
        Route::get('', [OrderContrller::class, 'index'])->name('index');
        Route::get('edit/{id}', [OrderContrller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [OrderContrller::class, 'update'])->name('update');
        // Route::get('delete/{id}', [BlogsController::class, 'delete'])->name('delete'); // todo xóa khi ko có hóa đơn
    });
});

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('products', [ClientController::class, 'products'])->name('products');
Route::get('product/{slug}', [ClientController::class, 'productDetail'])->name('product');
Route::get('blogs', [ClientController::class, 'blogs'])->name('blogs');
Route::get('lien-he', [ClientController::class, 'contact'])->name('contact');
Route::post('lien-he', [ClientController::class, 'sentContact'])->name('sentContact');
Route::get('blog/{slug}', [ClientController::class, 'blog'])->name('blog');

// check login
Route::get('carts', [ClientController::class, 'carts'])->middleware('clientLogin')->name('carts');
Route::get('order', [ClientController::class, 'order'])->middleware('clientLogin')->name('order');
Route::get('order/{id}', [ClientController::class, 'order_detail'])->middleware('clientLogin')->name('order_detail');
Route::post('update-carts', [ClientController::class, 'updateCarts'])->middleware('clientLogin')->name('updateCarts');
Route::post('checkout', [ClientController::class, 'checkout'])->middleware('clientLogin')->name('checkout');



// nhớ check user quyền đăng nhập người dùng
Route::name('api.')->middleware('ApiclientLogin')->prefix('api/')->group(function () {
    // id sản phẩm|| có sô lượng sp
    Route::post('add-to-cart/{product_id}', [ClientController::class, 'addCart'])->name('addCart');
    // id sản phẩm|| sl sản phẩm mặc định là 1 
    Route::get('add-cart/{product_id}', [ClientController::class, 'addCart'])->name('addCart');
});
