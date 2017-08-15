<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            
            
            //foreign key references to id on products table
            $table->integer('product_id')->unsigned();
            //foreign key references to id on property_names table
            $table->integer('property_name_id')->unsigned();
            //foreign key references to id on property_values table
            $table->integer('property_value_id')->unsigned();
            
            
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();
            
            
            //foreign keys
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('property_name_id')->references('id')->on('property_names');
            $table->foreign('property_value_id')->references('id')->on('property_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
