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
            //primary key
            $table->increments('id');
            //username
            $table->string('name');
            //unique email of user
            $table->string('email')->unique();
            //user password
            $table->string('password');
            //if user confirmed email 1 else 0
            $table->boolean('active')->default(0);
            //token for remember me checkbox when sign in
            $table->rememberToken();
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
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
        Schema::dropIfExists('users');
    }
}
