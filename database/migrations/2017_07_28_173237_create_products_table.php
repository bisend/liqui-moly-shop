<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //primary key
            $table->increments('id');
            
            
            //foreign key references to id on categories table
            $table->integer('category_id')->unsigned();
            //foreign key references to id on product_statuses table
            $table->integer('product_status_id')->unsigned()->nullable();
            
            
            //uk name
            $table->string('name_uk');
            //ru name
            $table->string('name_ru');
            //translit name
            $table->string('name_slug');
            //old price
            $table->decimal('old_price', 8, 2)->nullable();
            //price
            $table->decimal('price', 8, 2);
            //description
            $table->text('description')->nullable();
            //1c
            $table->string('code_1c', 36)->nullable();
            //created at updated at
            $table->timestamps();

            
            //foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_status_id')->references('id')->on('product_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
