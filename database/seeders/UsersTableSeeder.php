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
        $param = [
            'id' => '1',
            'member_number' => 'todoadmin',
            'name' => 'アドミニストレータ',
            'gender' => '0',
            'class' => '0',
            'birthday' => '1900-01-01',
            'password' => Hash::make('adminidais'),
        ];
        User::create($param);
    }
}