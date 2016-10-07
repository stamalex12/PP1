<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->integer('need_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('need_id')->references('id')->on('volunteering_needs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['need_id', 'user_id']);

            $table->string('taskName');
            $table->text('skillsAndQuals');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('files');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
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
        Schema::drop('applications');
    }
}
