<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter 'interview_id' column in the 'user_answers' table to string
        Schema::table('user_answers', function (Blueprint $table) {
            $table->string('interview_id')->change();
            $table->string('answer_text')->change();  // Change answer_text column to string
        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert 'interview_id' and 'answer_text' back to integer (or original type) in 'user_answers'
        Schema::table('user_answers', function (Blueprint $table) {
            $table->integer('interview_id')->change();  // Revert interview_id to integer
            $table->text('answer_text')->change();  // Revert answer_text back to text or original type
        });

        // Revert 'interview_id' in 'interviews' (if needed)
      
    }
}
