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

// 商品一覧ページ（初期表示）
Route::get('/productList', [App\Http\Controllers\ProductListController::class, 'index']);
// 商品一覧ページ（検索時）
Route::get('/productList/{keyword}', [App\Http\Controllers\ProductListController::class, 'search']);

// 購入ページ
Route::get('/buy', [App\Http\Controllers\userBuyController::class, 'index']);

// 購入確定ページ
Route::get('/buyConfirmed', [App\Http\Controllers\buyConfirmedController::class, 'index']);

// 会員登録完了ページ
Route::get('/memberRegistrationComp', [App\Http\Controllers\userBuyController::class, 'index']);