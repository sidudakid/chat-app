<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Add new columns
            $table->boolean('is_read')->default(false); // Example: Add a 'read' status for messages
            $table->string('attachment_url')->nullable(); // Example: Add a field for attachments

            // Modify existing columns if needed (optional)
            // For example: change the length of the 'message' column
            // $table->text('message')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Rollback changes (remove columns)
            $table->dropColumn('is_read');
            $table->dropColumn('attachment_url');

            // If you changed any column, revert it here
            // $table->string('message')->change();  // Revert the change to the 'message' column
        });
    }
}
?>