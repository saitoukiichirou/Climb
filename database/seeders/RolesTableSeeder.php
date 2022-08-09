<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => 'admin',
        ];
        Role::create($param);

        $param = [
            'id' => '2',
            'name' => 'user',
        ];
        Role::create($param);
    }
}
