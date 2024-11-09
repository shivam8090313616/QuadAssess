<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('interview_id'); // Interview ID (instead of foreign key)
            $table->integer('question_id'); // Question ID (instead of foreign key)
            $table->integer('answer_id'); // Answer ID (instead of foreign key)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
