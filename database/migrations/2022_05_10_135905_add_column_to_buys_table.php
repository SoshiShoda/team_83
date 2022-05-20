<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buys', function (Blueprint $table) {
            // buysテーブルにproduct_numberを追加
            $table->string('product_number',10)->index()->nullable($value = true)->comment('品番')->after('product_id');
            // buysテーブルにproduct_nameを追加
            $table->string('product_name', 50)->index()->comment('商品名')->after('product_id');
            // 請求書番号コメント変更
            $table->integer('invoice_id')->length(11)->index()->comment('請求書番号 例)2022000001')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buys', function (Blueprint $table) {
            // buysテーブルにproduct_numberを追加
            $table->string('product_number');
            // buysテーブルにproduct_nameを追加
            $table->string('product_name');
            // 請求書番号コメント変更
            $table->integer('invoice_id')->length(11)->index()->comment('請求書番号 例)2022000001')->change();
        });
    }
};