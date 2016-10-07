<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('testimonies');
            $table->integer('projects');
            $table->integer('resourceneeds');
            $table->integer('volunteerprograms');
            $table->integer('email');
            $table->integer('childdetails');
            $table->integer('userprofiles');
            $table->integer('slider');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('systems');
    }
}
