<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_values', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            //uk value
            $table->string('value_uk');
            //ru value
            $table->string('value_ru');
            //translit value
            $table->string('value_slug');
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
        Schema::dropIfExists('property_values');
    }
}
