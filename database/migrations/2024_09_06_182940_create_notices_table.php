<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->string('impact_level');  // For critical, medium, low levels
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Who posted the notice
            $table->string('profile_image')->nullable();  // Profile image associated with the notice
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notices', function (Blueprint $table) {
            $table->dropColumn('impact_level');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('profile_image');
        });
    }
}
