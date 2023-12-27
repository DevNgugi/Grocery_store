<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class, 'home'])->name('home');
Route::post('/search', [ProductController::class, 'search'])->name('search');
Route::post('/filter', [ProductController::class, 'filter'])->name('filter');
// Route::post('/myaccount', [ProfileController::class, 'Account'])->name('myaccount');

// Route::get('/product-details/{id}', [ProductController::class, 'productDetails'])->name('product-details');

// middleware authentication group
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    Route::post('/clearCart', [CartController::class, 'clearCart'])->name('clearCart');

    Route::post('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');

    Route::post('/addtocart', [CartController::class, 'store'])->name('addtocart');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::post('/createOrder', [CartController::class, 'createOrder'])->name('createOrder');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');

    // admin routes

    Route::get('/cartcount', [CartController::class, 'getCount'])->name('cartcount');
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard')->can('view-page');
    Route::get('/product-list', [ProductController::class, 'list'])->name('product-list')->can('view-page');
    Route::get('/add-product', [ProductController::class, 'index'])->name('add-product')->can('view-page');
    Route::post('/newproduct', [ProductController::class, 'newproduct'])->name('newproduct')->can('view-page');
    Route::post('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct')->can('view-page');
    Route::get('/product-categories', [CategoryController::class, 'index'])->name('product-categories')->can('view-page');
    Route::post('/addcategory', [CategoryController::class, 'addCategory'])->name('addcategory')->can('view-page');
    Route::post('/getcategory', [CategoryController::class, 'getcategory'])->name('getcategory')->can('view-page');
    Route::post('/deletecategory', [CategoryController::class, 'deletecategory'])->name('deletecategory')->can('view-page');
    Route::get('/orders-list', [OrderController::class, 'adminOrdersList'])->name('orders-list')->can('view-page');
    Route::get('/order-detail/{id}', [OrderController::class, 'orderDetailAdmin'])->name('order-detail')->can('view-page');
    Route::post('/order-detail/{id}', [OrderController::class, 'updateOrder'])->name('update-order')->can('view-page');
});

require __DIR__ . '/auth.php';