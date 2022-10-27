<?php

namespace Database\Seeders;

use App\Models\RoleUser;
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
        //admin用にロールを割り当て
        $param = [
          'user_id' => '1',
          'role_id' => '1'
        ];
        DB::table('role_user')->insert($param);
        
        //ゲスト用にロールを割り当て
        $param = [
          'user_id' => '2',
          'role_id' => '2'
        ];
        DB::table('role_user')->insert($param);
    }
}
