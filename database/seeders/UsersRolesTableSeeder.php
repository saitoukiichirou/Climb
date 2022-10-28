<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //管理者用のロール"admin"を割り当て
        $param = [
          'user_id' => '1',
          'role_id' => '1'
        ];
        DB::table('role_user')->insert($param);

        //guest用のロール"user"を割り当て
        $param = [
            'user_id' => '2',
            'role_id' => '2'
        ];
        DB::table('role_user')->insert($param);
    }
}
