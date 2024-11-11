<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserIdColumnTypeInUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // Change the user_id column type from bigint to string
            $table->string('user_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // Revert the user_id column back to bigint if needed
            $table->bigInteger('user_id')->change();
        });
    }
}
