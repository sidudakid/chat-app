<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Check if the column doesn't exist before adding it
            if (!Schema::hasColumn('users', 'facebook_link')) {
                $table->string('facebook_link')->nullable();
            }

            if (!Schema::hasColumn('users', 'is_admin')) {
                $table->boolean('is_admin')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'facebook_link')) {
                $table->dropColumn('facebook_link');
            }

            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
        });
    }
}
?>