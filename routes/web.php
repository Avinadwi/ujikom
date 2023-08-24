<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


use App\Http\Controllers\UserController;



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
/*
Route::get('/', function () {
    return view('landingpage.home');
});

*/
Route::get('/', [ProdukController::class, 'dataBarang']);
// Route::get('/home', [ProdukController::class, 'tampilBarang']);
Route::get('/home', function () {
    return view('landingpage.home');
});

Route::get('/about', function () {
    return view('landingpage.about');
});
Route::get('/cart', function () {
    return view('landingpage.cart');
});
Route::get('/teams', function () {
    return view('landingpage.teams');
});
Route::get('/contact', function () {
    return view('landingpage.contact');
});

Route::get('/register', function () {
    return view('admin.register');
});
Route::post('/login', [LoginController::class, 'login']);
Route::get('/shop', [ProdukController::class, 'dataShop']);
Route::get('/detailshop/{id}', [ProdukController::class, 'detail'])->name('detail');
// Route::resource('/', ProdukController::class);
// Route::resource('/home', ProdukController::class);

Auth::routes();

Route::get('/adpelanggan', [PelangganController::class, 'index']);
Route::get('/adpesanan', [PesananController::class, 'index']);
Route::get('/adproduk', [ProdukController::class, 'index']);
// Route::get('/adpesanan', [PesananController::class, 'index']);

//produk
Route::get('/home', [ProdukController::class, 'dataBarang']);
// Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
// Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);
// Route::post('/produk', [ProdukController::class, 'store']);




Route::middleware(['peran:Admin'])->group(function () {
Route::resource('produk', ProdukController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('pesanan', PesananController::class);
// Route::resource('contact', ContactController::class);



Route::put('/updatepelanggan/{id}', [PelangganController::class, 'update'])->name('update');
Route::get('/adpelanggan/{id}', [PelangganController::class, 'edit'])->name('edit');
Route::get('/header', function () {
    return view('admin.header');
});

Route::get('/index', function () {
    return view('admin.index');
});
Route::get('/produkh', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk-pdf', [ProdukController::class, 'produkPDF']);
Route::get('/produk-excel', [ProdukController::class, 'produkExcel']);
Route::get('/generate-pdf', [ProdukController::class, 'generatePDF']);
Route::get('/generate-pdf', [PelangganController::class, 'generatePDF']);
Route::get('/pelanggan-pdf', [PelangganController::class, 'pelangganPDF']);
Route::get('/pelanggan-excel', [PelangganController::class, 'pelangganExcel']);
Route::get('/pesanan-pdf', [PesananController::class, 'pesananPDF']);
Route::get('/pesanan-excel', [PesananController::class, 'pesananExcel']);
Route::get('/generate-pdf', [PesananController::class, 'generatePDF']);
Route::get('/dashboard', [DashboardController::class, 'index']);
});
// Route::get('/shop', [CartController::class, 'index'])->name('index');

// Route::get('/pesan', [PesanController::class, 'index']);
// Route::post('/pesan/{id}', [PesanController::class, 'pesan']);
Route::middleware(['peran:Pelanggan-Admin'])->group(function () {


Route::get('/pesan/{id}', [CartController::class, 'dcart']);
Route::post('/pesanan/{id}', [CartController::class, 'pesan']);
Route::get('/check-out', [CartController::class, 'check_out']);
Route::get('/check-out/{id}/delete', [CartController::class, 'delete']);
Route::get('konfirmasi-check-out', [CartController::class, 'konfirmasi']);
Route::post('upload-bukti/{id}', [CartController::class, 'uploadFoto'])->name('upload.bukti');
Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update']);
Route::get('history', [RiwayatController::class, 'index']);
Route::get('history/{id}', [RiwayatController::class, 'detail']);
    Route::get('/konfirmasi', [CartController::class, 'konfirmasi']);
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::put('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
});
