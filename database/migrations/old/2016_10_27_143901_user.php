<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('address',255);
            $table->string('tel', 13);
            $table->enum('field',['CHE', 'CSE', 'EM', 'CIVIL', 'EE', 'ENTC', 'MAT', 'TM', 'TLM', 'ME', 'MPR']);
            $table->boolean('gender');
            $table->string('school', 255);
            $table->smallInteger('level');
            $table->text('about')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->smallInteger('access')->default(0);
            //Profile picture


            $table->rememberToken();
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
        Schema::drop('users');
    }
}
