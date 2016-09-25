<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $userVal=array();
        array_push($userVal, $role_user);
        $role_admin = Role::where('name', 'Admin')->first();
        $AdminVal=array();
        array_push($AdminVal, $role_admin);
        $user = new User();
        $user->name = 'Victor';
        $user->username = 'Visitor';
        $user->email = 'visitor@example.com';
        $user->password = bcrypt('visitor');
        $user->save();

        $user->saveRoles($userVal);

        $admin = new User();
        $admin->name = 'Alex';
        $admin->username = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->saveRoles($AdminVal);

    }
}