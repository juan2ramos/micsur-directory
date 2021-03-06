<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients',function(Blueprint $table){
            $table->increments('id');
            $table->string('company');
            $table->string('country');
            $table->string('address');
            $table->string('sector');
            $table->text('activities');
            $table->string('website');
            $table->string('mobile');
            $table->string('phone');
            $table->integer('validate');
            $table->string('key_validate');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('clients');
    }
}
