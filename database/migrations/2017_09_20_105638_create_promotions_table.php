<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            //primary key
            $table->increments('id');

            //foreign key references to id on products table
            $table->integer('product_id')->unsigned()->unique();
            //foreign key references to id on product_statuses table
            $table->integer('product_status_id')->unsigned();
            //priority
            $table->integer('priority')->default(1000)->unsigned();

            //code 1c
            $table->string('code_1c', 36)->nullable();
            //timestamps
            $table->timestamps();

            //foreign keys
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('promotions');
    }
}
