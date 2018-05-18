<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',253);
            $table->string('email',40)->unique();
            $table->string('password');

            ////////////campos de twilio envio sms

            $table->string('phone_number');
            $table->string('country_code');
            $table->string('auth_id')->nullable();
            $table->boolean('verified')->default(false);
           // $table->dateTime('last_login')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });



            DB::table('users')->insert([
            'name'=>'danny',
            'email'=>'danny5sanchez5@gmail.com',
            'password'=>bcrypt('12345'),
            'phone_number'=>'4126464956',
            'country_code'=>'+58'

        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
