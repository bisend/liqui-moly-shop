<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('bottom_banner')->nullable()->after('icon');
            $table->string('top_banner')->nullable()->after('icon');
            $table->string('main_slider')->nullable()->after('icon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('bottom_banner');
            $table->dropColumn('top_banner');
            $table->dropColumn('main_slider');
        });
    }
}
