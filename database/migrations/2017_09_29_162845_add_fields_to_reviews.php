<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->unsigned()->change();
            $table->decimal('rating', 8, 2)->after('review');
            $table->boolean('is_moderated')->default(0)->after('review');
            $table->string('email')->after('review');
            $table->string('username')->after('review');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('is_moderated');
            $table->dropColumn('email');
            $table->dropColumn('username');
        });
    }
}
