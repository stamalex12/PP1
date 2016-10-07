<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(RoleTableSeeder::class);
        //$this->call(UserTableSeeder::class);
        $this->call(SystemSeeder::class);
    }
}

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')->insert([
            'testimonies' => 1,
            'projects' => 1,
            'resourceneeds' => 1,
            'volunteerprograms' => 1,
            'email' => 1,
            'childdetails' => 1,
            'userprofiles' => 1,
            'slider' => 1,

        ]);
    }
}
