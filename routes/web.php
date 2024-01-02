<?php

use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\SaransController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\LandingPageController;

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

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['auth:user']],function () {
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/dashboard/product', [ProductController::class, 'index']);

    Route::get('/dashboard/cart', [CartController::class, 'index']);
    Route::post('/tambah-cart/{product:id}',[CartController::class, 'store'])->name('tambah-cart');
    Route::put('/cart/plus/{cart:id}', [CartController::class, 'tambahQty'])->name('tambah-qty');
    Route::put('/cart/min/{cart:id}', [CartController::class, 'kurangQty'])->name('kurang-qty');
    Route::delete('/delete-product/{cart:id}',[CartController::class, 'destroy'])->name('delete-product');


    Route::get('/dashboard/riwayat', [RiwayatController::class, 'index']);
    
    Route::get('/dashboard/saran', [SaranController::class, 'index']);
    Route::post('/tambah-saran', [SaranController::class, 'store'])->name('tambah-saran');
    Route::post('/checkout', [CheckoutController::class,'store'])->name('checkout');
    
});




Route::group(['middleware' => ['auth:admin']],function () {
    Route::get('/dashboard/admin',[DashboardController::class, 'indexs'])->name('dashboard');
    Route::get('/dashboard/admin/home',[DashboardController::class, 'indexs']);
   
    Route::get('/dashboard/admin/products',[ProductsController::class, 'index']);
    Route::get('/dashboard/admin/products/create',[ProductsController::class, 'create']);
    Route::post('/tambah-product',[ProductsController::class, 'store'])->name('tambah-product');
    Route::delete('/delete-barang/{product:id}',[ProductsController::class, 'destroy'])->name('delete-barang');
    
    Route::get('/dashboard/admin/products/edit/{product:id}',[ProductsController::class, 'edit']);
    Route::put('/dashboard/admin/update/{product:id}',[ProductsController::class, 'update']);




    Route::get('/dashboard/admin/sarans',[SaransController::class, 'index'])->name('/dashboard/admin/sarans');
    Route::delete('/delete-saran/{saran:id}',[SaransController::class, 'destroy'])->name('delete-saran');
   





    Route::get('/dashboard/admin/riwayats',[RiwayatsController::class, 'index']); 
    Route::get('/dashboard/admin/riwayats/{id}', [RiwayatsController::class, 'setujui']);
    // Route::get('/dashboard/admin/riwayats/{id}', [RiwayatsController::class, 'konfirmasi']);
    Route::get('/dashboard/admin/riwayats/{id}', [RiwayatsController::class, 'cancel']);
    Route::get('/cetak-struk/{id}', [RiwayatsController::class, 'cetakStruk']);
    Route::post('/dashboard/admin/riwayats/cetak-Riwayat', [RiwayatsController::class, 'cetakRiwayat'])->name("cetak-Riwayat");

});










