<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\InforController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\User\ContactController;
use App\Http\Service\Product\ProductUserService;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\User\ChangeinforController;
use App\Http\Controllers\User\Menu\MenuUserController;
use App\Http\Controllers\User\Comment\CommentController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\User\Product\ProductDetailController;




Route::get('/home', [HomeController::class, 'index'])->name('user_home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'check']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'insert']);
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Admin
    Route::prefix('/Admin')->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('admin_home');

        // Danh mục
        Route::prefix('/Menu')->group(function () {
            Route::get('/add', [MenuController::class, 'index'])->name('addMenu');
            Route::post('/add', [MenuController::class, 'addMenu']);
            Route::get('/list', [MenuController::class, 'listMenu'])->name('Menulist');
            Route::get('/edit/{id}', [MenuController::class, 'getEdit']);
            Route::post('/update', [MenuController::class, 'postEdit']);
            Route::get('/delete/{id}', [MenuController::class, 'delete']);
        });

        // Product
        Route::prefix('/Product')->group(function () {
            Route::get('/add', [ProductController::class, 'index'])->name('addProduct');
            Route::post('/add', [ProductController::class, 'addProduct']);
            Route::get('/list', [ProductController::class, 'listProduct'])->name('productlist');
            Route::get('/edit/{id}', [ProductController::class, 'getEdit']);
            Route::post('/update', [ProductController::class, 'postEdit']);
            Route::get('/delete/{id}', [ProductController::class, 'delete']);
        });

        // Customer
        Route::prefix('/Customer')->group(function () {
            Route::get('/list', [CustomerController::class, 'index'])->name('listCustomer');
            Route::get('/infor/{customer}', [CustomerController::class, 'show']);
            Route::get('/delete/{customer}', [CustomerController::class, 'delete']);
        });
        
        #Upload
        Route::post('Upload/Services', [UploadController::class, 'store']);
    });

    // User
    Route::get('/infor',[InforController::class, 'index'])->name('infor');
    Route::get('/changeinfor/{id}',[ChangeinforController::class, 'index'])->name('changeinfor');
    Route::post('/updateinfor',[ChangeinforController::class, 'update'])->name('updateinfor');

    
});

// Load more
Route::post('/Service/load-product',[HomeController::class, 'loadProduct']);

Route::prefix('/cuahang')->group(function () {
    
    Route::get('/', [MainController::class, 'cuahang_index'])->name('cuahang');
    
    Route::get('{id}/{slug}.html', [ProductDetailController::class, 'index']);
    
    Route::get('{id}-{slug}.html', [MenuUserController::class, 'index']);

});

// Bình luận

Route::post('/SendComment', [CommentController::class, 'sendcomment']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

// Mail
Route::get('/lienhe', [ContactController::class, 'index'])->name('contact');
Route::post('/lienhe', [ContactController::class, 'sendContact']);

Route::post('/add-cart', [CartController::class, 'index']);

// Hiển thị trang giỏ hàng
Route::get('/carts', [CartController::class, 'show']);

Route::post('/carts', [CartController::class, 'addCart']);

Route::post('update-cart', [CartController::class, 'update']);

Route::get('/carts/delete/{id}', [CartController::class, 'remove']);

#Upload
Route::post('Upload/Services', [UploadController::class, 'store']);

