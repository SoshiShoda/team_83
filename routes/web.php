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




/*
Route::get('/', function () {
    return view('welcome');
});
*/

// このページは後日削除します。作業中のページ確認用に作成しました。
Route::get('/', function () {
    return view('list_page');
});
// 仕入一覧ページ
Route::get('/purchaseList', function () {
    return view('admin/purchaseList');
});
//仕入登録ページ 
Route::get('/registerNewPurchase', function () {
    return view('admin/registerNewPurchase');
});
// 販売管理ページ
Route::get('/salesManagement', function () {
    return view('admin/salesManagement');
});
// 商品編集ページ
Route::get('/productEdit', function () {
    return view('admin/productEdit');
});
// 商品登録ページ
Route::get('/productRegister', function () {
    return view('admin/productRegister');
});
// レビュー編集ページ
Route::get('/review_edit', function () {
    return view('user/review_edit');
});
// レビュー登録ページ
Route::get('/review_register', function () {
    return view('user/review_register');
});



// 在庫管理ページで商品名検索をする
Route::get('/inventory_management', [App\Http\Controllers\ProductController::class, 'inventory_search']);




