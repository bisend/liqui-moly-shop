<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            //original image file path
            $table->string('original')->nullable();
            //big image file path
            $table->string('big')->nullable();
            //medium image file path
            $table->string('medium')->nullable();
            //small image file path
            $table->string('small')->nullable();
            //icon image file path
            $table->string('icon')->nullable();
            //1c
            $table->string('code_1c', 36)->nullable();
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
        Schema::dropIfExists('images');
    }
}
