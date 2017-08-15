<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBottomBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bottom_banner', function (Blueprint $table) {
            //primary key
            $table->increments('id');

            //foreign key references to id on images table
            $table->integer('image_id')->unsigned();

            //big txt uk
            $table->string('big_text_uk')->nullable();
            //medium txt uk
            $table->string('medium_text_uk')->nullable();
            //url uk
            $table->string('url_uk')->nullable();

            //big txt ru
            $table->string('big_text_ru')->nullable();
            //medium txt ru
            $table->string('medium_text_ru')->nullable();
            //url ru
            $table->string('url_ru')->nullable();

            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();

            //foreign keys
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bottom_banner');
    }
}
