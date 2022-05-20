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


Route::get('/review_register/{user_id}/{product_id}',[App\Http\Controllers\ReviewController::class,'review_register'])->name('review_register');
//レビュー登録
Route::post('/review_add/{user_id}/{product_id}',[App\Http\Controllers\ReviewController::class,'review_add'])->name('review_add');
//レビュー編集ページ
Route::get('/review_edit/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_edit'])->name('review_edit');
//レビュー編集
Route::post('/review_update/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_update'])->name('review_update');
//レビュー削除
Route::get('/review_delete/{user_id}/{review_id}',[App\Http\Controllers\ReviewController::class,'review_delete'])->name('review_delete');

//ユーザー編集
Route::get('/user_edit/{user_id}',[App\Http\Controllers\UserController::class,'user_edit'])->name('user_edit');
Route::post('/user_update/{user_id}',[App\Http\Controllers\UserController::class,'user_update'])->name('user_update');
