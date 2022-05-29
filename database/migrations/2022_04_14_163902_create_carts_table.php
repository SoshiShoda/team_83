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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id')->index()->comment('カートID');
            $table->string('cart_status', 20)->index()->default('active')->comment('カートステータス active or deleted');
            $table->integer('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->integer('product_id')->unsigned()->index()->comment('商品ID');
            $table->string('product_name', 50)->index()->comment('商品名');
            $table->string('product_number',10)->index()->nullable($value = true)->comment('品番');
            $table->integer('bought_price')->length(10)->index()->comment('販売価格 税抜');
            $table->integer('bought_price_with_tax')->length(10)->index()->comment('販売価格 税込');
            $table->integer('bought_tax_rate')->length(3)->index()->comment('消費税率');
            $table->integer('bought_quantity')->length(10)->index()->comment('カート個数');
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
        Schema::dropIfExists('carts');
    }
};
