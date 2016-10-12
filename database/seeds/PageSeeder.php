<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page->name = 'Home';
        $page->save();

        $page2 = new Page();
        $page2->name = 'About';
        $page2->save();
    }
}
