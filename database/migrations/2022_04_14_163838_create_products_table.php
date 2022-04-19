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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->index()->comment('商品ID');
            $table->string('product_status', 20)->index()->default('active')->comment('商品ステータス active or deleted');
            $table->string('product_name', 50)->index()->comment('商品名');
            $table->string('product_size',50)->index()->comment('商品size');
            $table->string('product_barcode',13)->index()->nullable($value = true)->comment('JANコード');
            $table->string('product_number',10)->index()->nullable($value = true)->comment('品番');
            $table->integer('product_price')->length(10)->index()->default(0)->comment('商品販売価格 税抜');
            $table->integer('product_price_with_tax')->length(10)->index()->default(0)->comment('商品販売価格 税込');
            $table->integer('product_tax_rate')->length(3)->index()->default(0)->comment('消費税率');
            $table->string('product_category',50)->index()->comment('商品カテゴリー');
            $table->string('product_detail',191)->index()->comment('商品説明');
            $table->integer('stock_quantity')->length(10)->default(0)->comment('在庫数');
            $table->integer('ordering_point')->length(10)->default(0)->comment('発注点');
            $table->string('product_image1',191)->nullable($value = true)->comment('商品画像URL 1');
            $table->string('product_image2',191)->nullable($value = true)->comment('商品画像URL 2');
            $table->string('product_image3',191)->nullable($value = true)->comment('商品画像URL 3');
            $table->string('product_image4',191)->nullable($value = true)->comment('商品画像URL 4');
            $table->string('product_image5',191)->nullable($value = true)->comment('商品画像URL 5');
            $table->string('product_image6',191)->nullable($value = true)->comment('商品画像URL 6');
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
        Schema::dropIfExists('products');
    }
};
