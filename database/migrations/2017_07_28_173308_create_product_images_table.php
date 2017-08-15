<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            
            
            //foreign key references to id on products table
            $table->integer('product_id')->unsigned();
            //foreign key references to id on images table
            $table->integer('image_id')->unsigned();
            
            
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();
            
            
            //foreign keys
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_images');
    }
}
