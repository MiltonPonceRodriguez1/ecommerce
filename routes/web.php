<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', [HomeController::class, 'index'])->name('Home.index');
Route::get('/new-product', [HomeController::class, 'new'])->name('Home.new');

Route::get('/', [ProductController::class, 'index'])->name('Product.index');
Route::post('/search', [ProductController::class, 'searchByRange'])->name('Product.searchByRange');
Route::post('/search-by-name', [ProductController::class, 'searchByName'])->name('Product.searchByName');
Route::post('/store', [ProductController::class, 'store'])->name('Product.store');