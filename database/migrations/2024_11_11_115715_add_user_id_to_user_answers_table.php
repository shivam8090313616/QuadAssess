<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter 'user_answers' table
        Schema::table('user_answers', function (Blueprint $table) {
            // Add the 'user_id' column after 'id'
            $table->unsignedBigInteger('user_id')->after('id');  // Add user_id column after id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Rollback the changes if needed
        Schema::table('user_answers', function (Blueprint $table) {
            // Drop the 'user_id' column
            $table->dropColumn('user_id');
        });
    }
}
