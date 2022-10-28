<?php

namespace Database\Seeders;

use App\Models\Problem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersRolesTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(ProblemsTableSeeder::class);
        $this->call(ScoresTableSeeder::class);

        //これでもfactoryで生成できる
//         \App\Models\User::factory(10)->create();
    }
}
