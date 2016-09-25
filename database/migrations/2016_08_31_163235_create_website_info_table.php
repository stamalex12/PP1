<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyName');
            $table->string('addressLine1');
            $table->string('addressLine2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postCode');
            $table->string('phoneNo');
            $table->string('email');
            $table->string('logofilepath');
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
        Schema::drop('website_info');
    }
}
