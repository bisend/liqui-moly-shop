<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusIdToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            $table->integer('status_id')->after('delivery_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('order_statuses');
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            $table->dropForeign('status_id');
            $table->dropColumn('status_id');
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        });
    }
}
