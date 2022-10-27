<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //管理者アカウント1件
        $param = [
            'id' => '1',
            'member_number' => 'admin',
            'name' => 'アドミニストレータ',
            'gender' => '0',
            'class' => '0',
            'birthday' => '1900-01-01',
            'password' => Hash::make('admin'),
        ];
        User::create($param);
        
        //ゲスト閲覧用アカウント1件
        $param = [
            'id' => '2',
            'member_number' => 'guest',
            'name' => 'ゲスト',
            'gender' => '0',
            'class' => '0',
            'birthday' => '1900-01-01',
            'password' => Hash::make('guest'),
        ];

        //ダミーユーザー100件生成
        User::factory()->count(100)->create();
    }
}
