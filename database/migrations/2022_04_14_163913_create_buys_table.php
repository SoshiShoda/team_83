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
        Schema::create('buys', function (Blueprint $table) {
            $table->increments('id')->index()->comment('売上ID');
            $table->string('bought_status', 20)->index()->default('active')->comment('売上ステータス active or deleted');
            $table->integer('user_id')->unsigned()->index()->comment('ユーザーID');
            //【add-S 20220524 watanabe レビュー機能の削除とテーブル調整】
            $table->string('product_name', 50)->index()->comment('商品名');
            $table->string('product_number',10)->index()->nullable($value = true)->comment('品番');
            //【add-E 20220524 watanabe レビュー機能の削除とテーブル調整】
            $table->integer('invoice_id')->length(11)->index()->comment('請求書番号 例)20220000001');
            $table->integer('product_id')->unsigned()->index()->comment('商品ID');
            $table->integer('bought_price')->length(10)->index()->comment('販売価格 税抜');
            $table->integer('bought_price_with_tax')->length(10)->index()->comment('販売価格 税込');
            $table->integer('bought_tax_rate')->length(3)->index()->comment('消費税率');
            $table->integer('bought_quantity')->length(10)->index()->comment('販売数');
            $table->string('payment_method', 50)->index()->comment('支払方法');
            $table->date('shipment_date')->index()->nullable($value = true)->comment('発送完了日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buys');
    }
};
