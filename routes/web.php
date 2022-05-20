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


// 販売管理・売上情報ページ
Route::get('/sales_management', 'App\Http\Controllers\BuyController@buyIndex')->name('buy_index');


// 仕入一覧ページ
Route::get('/purchase_list', 'App\Http\Controllers\PurchaseController@purchaseIndex')->name('purchases');

// 仕入登録ページ
Route::get('/purchase_register', function () {
    return view('admin.purchase_register');
})->name('purchase');

// 仕入登録ボタン押下時
Route::post('/purchase_register/post', 'App\Http\Controllers\PurchaseController@purchaseStore')->name('purchase_register');

// 仕入削除ボタン押下時
Route::delete('/purchase/{purchase}', 'App\Http\Controllers\PurchaseController@purchaseDestroy')->name('purchase_delete');


// 商品詳細ページ
Route::get('/product_detail/{id}', 'App\Http\Controllers\ProductController@productDetailIndex')->name('product_detail');

// カートに追加ボタン押下時
Route::post('/product_detail/{id}/post', 'App\Http\Controllers\CartController@addCart')->name('add_cart');

// 購入ページ表示
route::get('/purchase', function () {
    return view('user.purchase');
})->name('buy_page');

// 商品登録ページ表示
Route::get('/product_register', function () {
    return view('admin.product_register');
})->name('product');

// 商品登録ボタン押下時
Route::post('/product_register/post', 'App\Http\Controllers\ProductController@productStore')->name('product_register');

// 商品更新ページ表示
Route::get('/product_edit/{id}', 'App\Http\Controllers\ProductController@productEditIndex')->name('product_edit');
// 商品更新ボタン押下時
Route::patch('/product_update/{id}', 'App\Http\Controllers\ProductController@productUpdate')->name('product_update');
