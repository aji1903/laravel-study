<?php



use Illuminate\Support\Facades\Route;
// *1
use App\Http\Controllers\BelajarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
// *1
Route::get('belajar', [BelajarController::class, 'index']);
// cara ke dua dibawah
// Route::get('belajar', [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);
Route::get('bagi', [BelajarController::class, 'bagi']);
Route::get('kali', [BelajarController::class, 'kali']);
Route::get('login', [LoginController::class, 'login']);

// resource dapat mengcover post get delete
Route::resource('dashboard', DashboardController::class);
Route::resource('product', ProductController::class);

Route::resource('categories', CategoriesController::class);
Route::resource('user', UserController::class);
route::resource('pos',TransactionController::class);
route::get('get-product/{id}',[TransactionController::class,'getProduct']);






// ketka sudah membuat di BelajarController(method function) kemudian tambah di web.php
Route::post('action-tambah', [BelajarController::class, 'actionTambah']);
Route::post('action-login', [LoginController::class, 'actionLogin']);
