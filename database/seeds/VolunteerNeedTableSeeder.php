<?php

use App\User;
use App\VolunteerNeed;
use App\VolunteerUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VolunteerNeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('volunteer_needs')->delete();
        DB::table('volunteer_users')->delete();
        DB::table('volunteerNeeds_users')->delete();

        $needOne = VolunteerNeed::create(array(
            'name'          =>  'Test',
            'description'   =>  'Test',
            'startDate'     =>  '2016-01-01',
            'endDate'       =>  '2017-01-01',
            'skillsNeeded'  =>  'English'
        ));
        $needTwo = VolunteerNeed::create(array(
            'name'          =>  'Test2',
            'description'   =>  'Test',
            'startDate'     =>  '2016-01-01',
            'endDate'       =>  '2017-01-01',
            'skillsNeeded'  =>  'English'
        ));

        $userOne = User::create(array(
            'name'     =>  'Alex',
            'username'      =>  'Stamadaldhaoifig',
            'email'         =>  'stamalex1222@gmail.com',
            'password'      =>  '17051994',
        ));
        $userTwo = User::create(array(
            'name'     =>  'Alexandros',
            'username'      =>  'Stamdawdawda',
            'email'         =>  'stamalex1221@gmail.com',
            'password'      =>  '17051994',
        ));
        /*$userTwo = VolunteerUser::create(array(
            'firstName'     =>  'Alex',
            'lastName'      =>  'Stamatopoulos',
            'mail'         =>  'stamalex12@gmail.com'
        ));*/

        $needOne->volunteerUsers()->attach($userOne->id);
        $needOne->volunteerUsers()->attach($userTwo->id);
        $needTwo->volunteerUsers()->attach($userOne->id);
        $needTwo->volunteerUsers()->attach($userTwo->id);


    }
}
