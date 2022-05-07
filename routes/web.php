<?php

use Illuminate\Support\Facades\Route;
use APP\Http\Controllers;

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





Route::get('/', function () {
    return view('welcome');
});

// 在庫管理ページで商品名検索をする
Route::get('/inventory_management', [App\Http\Controllers\ProductController::class, 'inventory_search'])->name('inventory_management');



