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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id')->index()->comment('レビューID');
            $table->string('review_status', 20)->index()->default('active')->comment('レビューステータス active or deleted');
            $table->integer('user_id')->unsigned()->index()->comment('ユーザーID');
            $table->integer('product_id')->unsigned()->index()->comment('商品ID');
            $table->integer('buy_id')->unsigned()->index()->comment('売上ID');
            $table->integer('review_rating')->length(1)->index()->comment('レビュー数値評価');
            $table->string('review_text',191)->index()->comment('レビュー内容');
            $table->string('review_image',191)->nullable($value = true)->comment('レビュー画像URL');
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
        Schema::dropIfExists('reviews');
    }
};
