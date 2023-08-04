<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isTamu;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('beranda');
});

Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
    //nama prefix //nama function di controller // name route
    Route::get('/registration', 'registration')->name('registration')->middleware('isTamu');
    Route::post('/validate_registration', 'validate_registration')->name('validate_registration')->middleware('isTamu');
    Route::get('/login', 'login')->name('login')->middleware('isTamu');
    Route::post('/validate_login', 'validate_login')->name('validate_login')->middleware('isTamu');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/beranda', 'index')->name('beranda')->middleware('isLogin');
});

Route::controller(ProductController::class)->name('product.')->prefix('product')->middleware('isLogin')->group(function () {
    //nama prefix //nama function di controller // name route
    Route::get('/input', 'input')->name('input');
    Route::post('/validate_input', 'validate_input')->name('validate_input');
    Route::get('/list_produk', 'list_produk')->name('list_produk');
    Route::get('/delete_produk/{id}', 'delete_produk')->name('delete_produk');
});
