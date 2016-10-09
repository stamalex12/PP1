<?php

use Illuminate\Database\Seeder;
use App\Month;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(MonthSeeder::class);
    }
}