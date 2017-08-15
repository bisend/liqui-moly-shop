<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            //foreign key if has parent category
            $table->integer('parent_id')->unsigned()->nullable();
            //uk name
            $table->string('name_uk');
            //ru name
            $table->string('name_ru');
            //translit name
            $table->string('name_slug');
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();

            //foreign key
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
