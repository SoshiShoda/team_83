<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一般ユーザー
        User::create([
            'id'           => '1',
            'user_status'  => 'active',
            'staff'        => 'staff',
            'user_name'    => '一般ユーザー',
            'post_code'    => '1234567',
            'prefecture'   => 'テスト県',
            'municipality' => 'テスト市テスト町１３７４',
            'apartment'    => 'テストマンション',
            'email'        => 'test1@pass1.com',
            'phone_number' => '12345678901',
            'birthday'     => '20000101',
            'occupation'   => 'プー太郎',
            'gender'       => '男性',
            'password'     => 'pass1',
        ]);

        // 管理者ユーザー
        User::create([
            'id'           => '2',
            'user_status'  => 'active',
            'staff'        => 'customer',
            'user_name'    => '管理者ユーザー',
            'post_code'    => '1234567',
            'prefecture'   => 'テスト県',
            'municipality' => 'テスト市テスト町１３７４',
            'apartment'    => 'テストマンション',
            'email'        => 'test2@pass2.com',
            'phone_number' => '12345678901',
            'birthday'     => '20000101',
            'occupation'   => 'プー太郎',
            'gender'       => '女性',
            'password'     => 'pass2',
        ]);
    }
}
