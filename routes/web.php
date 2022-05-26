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
    return redirect('product_list');
});

// ログインページ
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);
// ログインチェック
Route::post('/login/check', [App\Http\Controllers\LoginController::class, 'check']);
// ログインアウト
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

// 管理者トップページ
Route::get('/staff_top', [App\Http\Controllers\LoginController::class, 'staff_index']);

// 購入ページ
Route::get('/buy', [App\Http\Controllers\userBuyController::class, 'index']);

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
// 商品一覧ページ表示
Route::get('/product_list', 'App\Http\Controllers\ProductController@productListIndex')->name('product_list');

// 在庫管理ページ
Route::get('/inventory_management',[App\Http\Controllers\ProductController::class, 'inventory_search'])->name('inventory_management');
//【del-S 20220524 watanabe レビュー機能の削除とテーブル調整】
// // レビュー登録ページ
// Route::get('/review_register/{user_id}/{product_id}',[App\Http\Controllers\ReviewController::class,'review_register'])->name('review_register');
// //レビュー登録
// Route::post('/review_add/{user_id}/{product_id}',[App\Http\Controllers\ReviewController::class,'review_add'])->name('review_add');
// //レビュー編集ページ
// Route::get('/review_edit/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_edit'])->name('review_edit');
// //レビュー編集
// Route::post('/review_update/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_update'])->name('review_update');
// //レビュー削除
// Route::get('/review_delete/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_delete'])->name('review_delete');
//【del-E 20220524 watanabe レビュー機能の削除とテーブル調整】
//ユーザー編集
Route::get('/user_edit/{user_id}',[App\Http\Controllers\UserController::class,'user_edit'])->name('user_edit');
Route::post('/user_update/{user_id}',[App\Http\Controllers\UserController::class,'user_update'])->name('user_update');

// 購入確定ページ
Route::get('/buyConfirmed', [App\Http\Controllers\buyConfirmedController::class, 'index']);

//ユーザー登録ページ
Route::get('/user_register',[App\Http\Controllers\UserController::class,'register_index'])->name('user_register');
Route::post('/user_register',[App\Http\Controllers\UserController::class,'register_insert'])->name('user_register_insert');

// 会員登録完了ページ
Route::get('/memberRegistrationComp', [App\Http\Controllers\memberRegistrationCompController::class, 'index']);