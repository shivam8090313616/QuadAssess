<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserAnswersAddJsonColumns extends Migration
{
    public function up()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // Changing the existing columns to JSON
            $table->json('question_id')->nullable()->change();  // Store all question IDs as JSON
            $table->json('answer_text')->nullable()->change();  // Store all answers as JSON
        });
    }

    public function down()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // Reverting the columns back to the original type (if required)
            $table->text('question_id')->nullable()->change();
            $table->text('answer_text')->nullable()->change();
        });
    }
}
