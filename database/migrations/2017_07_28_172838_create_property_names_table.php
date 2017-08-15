<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_names', function (Blueprint $table) {
            //primary key
            $table->increments('id');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_names');
    }
}
