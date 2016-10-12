<?php

use Illuminate\Database\Seeder;
use App\Role;

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
            'rooms' => 1,
            'reports' => 1,
            'incomeexpense' => 1,
        ]);
        $role_user = new Role();
        $role_user->name = 'Visitor';
        $role_user->description = 'A normal User';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Auditor';
        $role_user->description = 'A normal User';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'A Admin';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'Manager';
        $role_user->description = 'A normal User';
        $role_user->save();
    }


}
