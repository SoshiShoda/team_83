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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->index()->comment('ユーザーID');
            $table->string('user_status', 20)->index()->default('active')->comment('会員ステータス active or deleted');
            $table->string('staff', 20)->index()->default('customer')->comment('管理者ステータス customer or staff');
            $table->string('user_name', 50)->index()->comment('氏名');
            $table->string('post_code', 7)->index()->comment('郵便番号 数字のみ');
            $table->string('prefecture', 4)->index()->comment('都道府県');
            $table->string('municipality', 191)->index()->comment('市区町村番地');
            $table->string('apartment', 191)->nullable($value = true)->index()->comment('マンション名部屋番号');
            $table->string('email',191)->unique()->index()->comment('メールアドレス');
            $table->string('phone_number', 11)->index()->comment('電話番号');
            $table->date('birthday')->index()->comment('生年月日');
            $table->string('occupation', 50)->index()->comment('職業');
            $table->string('gender', 10)->index()->comment('性別 男性or女性orその他');
            $table->string('password',128)->comment('パスワード');
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
        Schema::dropIfExists('users');
    }
};
