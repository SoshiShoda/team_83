<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//【add-S 20220524 watanabe レビュー機能の削除とテーブル調整】
use Illuminate\Support\Facades\Schema;
//【add-E 20220524 watanabe レビュー機能の削除とテーブル調整】

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //【add-S 20220524 watanabe レビュー機能の削除とテーブル調整】
        // herokuデプロイ時のためにデフォルト設定を191桁に設定しておく
        Schema::defaultStringLength(191);
        //【add-E 20220524 watanabe レビュー機能の削除とテーブル調整】
    }
}
