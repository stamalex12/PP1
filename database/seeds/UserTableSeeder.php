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
        $role_user = Role::where('name', 'Visitor')->first();
        $userVal=array();
        array_push($userVal, $role_user);

        $role_auditor = Role::where('name', 'Auditor')->first();
        $auditorVal=array();
        array_push($auditorVal, $role_auditor);

        $role_admin = Role::where('name', 'Admin')->first();
        $AdminVal=array();
        array_push($AdminVal, $role_admin);

        $role_manager = Role::where('name', 'Manager')->first();
        $managerVal=array();
        array_push($managerVal, $role_manager);


        $user = new User();
        $user->name = 'Victor';
        $user->username = 'Visitor';
        $user->email = 'visitor@example.com';
        $user->password = bcrypt('visitor');
        $user->subscriber = 1;
        $user->save();
        $user = User::where('username', 'Visitor')->first();
        //$user->saveRoles($userVal);

        $admin = new User();
        $admin->name = 'Alex';
        $admin->username = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->subscriber = 1;
        $admin->save();
        $admin = User::where('username', 'Admin')->first();
        //$admin->saveRoles($AdminVal);

        $auditor = new User();
        $auditor->name = 'Aldo';
        $auditor->username = 'Auditor';
        $auditor->email = 'auditor@example.com';
        $auditor->password = bcrypt('auditor');
        $auditor->subscriber = 1;
        $auditor->save();
        $auditor = User::where('username', 'Auditor')->first();
        //$admin->saveRoles($auditorVal);

        $manager = new User();
        $manager->name = 'Malvin';
        $manager->username = 'Manager';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('manager');
        $manager->subscriber = 1;
        $manager->save();
        $manager = User::where('username', 'Manager')->first();
        //$admin->saveRoles($managerVal);



        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $role_user->id,
        ]);
        DB::table('role_user')->insert([
                'user_id' => $auditor->id,
                'role_id' => $role_auditor->id,
            ]);
        DB::table('role_user')->insert([
                'user_id' => $admin->id,
                'role_id' => $role_admin->id,
            ]);
        DB::table('role_user')->insert([
                'user_id' => $manager->id,
                'role_id' => $role_manager->id,
            ]);

    }
}