<?php

use Illuminate\Database\Seeder;
use App\Month;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month = new Month();
        $month->name = 'January';
        $month->save();

        $month = new Month();
        $month->name = 'February';
        $month->save();

        $month = new Month();
        $month->name = 'March';
        $month->save();

        $month = new Month();
        $month->name = 'April';
        $month->save();

        $month = new Month();
        $month->name = 'May';
        $month->save();

        $month = new Month();
        $month->name = 'June';
        $month->save();

        $month = new Month();
        $month->name = 'July';
        $month->save();

        $month = new Month();
        $month->name = 'August';
        $month->save();

        $month = new Month();
        $month->name = 'September';
        $month->save();

        $month = new Month();
        $month->name = 'October';
        $month->save();

        $month = new Month();
        $month->name = 'November';
        $month->save();

        $month = new Month();
        $month->name = 'December';
        $month->save();
    }
}
