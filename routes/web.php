<?php

use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\uploadController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;




//login Admin
Route::get('/login',[FrontendController::class,'show_login'])->name('login');
Route::post('/check_login',[FrontendController::class,'check_login']);


//Nhom Lai
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {return view('admin.home');});
        Route::get('product/create', [productController::class,'add_product']);
        Route::get('product/list', [productController::class,'list_product']);
        Route::get('order/list',[orderController::class,'list_order']);
    });
});



// Product
Route::post('/admin/product/add',[productController::class,'insert_product']);
Route::get('/admin/product/delete', [productController::class,'delete_product']);
Route::get('/admin/product/edit/{id}', [productController::class,'edit_product']);
Route::post('/admin/product/edit/{id}', [productController::class,'update_product']);



//order
Route::get('/admin/order/details/{order_detail}',[orderController::class,'details_order']);

//xoa order
Route::get('/admin/order/delete', [OrderController::class, 'delete_order']);

//upload
Route::post('/upload',[uploadController::class,'uploadImage']);
Route::post('/uploads',[uploadController::class,'uploadImages']);

//frontend
Route::get('/',[FrontendController::class,'index']);
Route::get('/product/{id}',[FrontendController::class,'show_product']);

Route::get('/order/confirm', function () {return view('order.confirm');});
Route::get('/order/success', function () {return view('order.success');});

//gio hang
Route::post('/cart/add',[FrontendController::class,'add_cart']);
Route::get('/cart',[FrontendController::class,'show_cart']);
Route::get('/cart/delete/{id}',[FrontendController::class,'delete_cart']);
Route::post('/cart/update',[FrontendController::class,'update_cart']);
Route::post('/cart/send',[FrontendController::class,'send_cart']);


//tim kiem sp cho khach hang
Route::get('/search', [productController::class, 'search'])->name('search');

//hien thi số lượng sản phẩm trong giỏ hàng lên icon giỏ hàng
Route::post('/cart/update', [FrontendController::class, 'update_carts'])->name('cart.update');