<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishListProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wish_list_products', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            
            
            //foreign key references to id on wish_lists table
            $table->integer('wish_list_id')->unsigned();
            //foreign key references to id on products table
            $table->integer('product_id')->unsigned();
            
            
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();
            
            
            //foreign keys
            $table->foreign('wish_list_id')->references('id')->on('wish_lists');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wish_list_products');
    }
}
