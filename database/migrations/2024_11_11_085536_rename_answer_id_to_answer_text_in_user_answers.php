<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAnswerIdToAnswerTextInUserAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_answers', function (Blueprint $table) {
            // Rename column from 'answer_id' to 'answer_text'
            $table->renameColumn('answer_id', 'answer_text');
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
            // Revert the column name change in case of rollback
            $table->renameColumn('answer_text', 'answer_id');
        });
    }
}
