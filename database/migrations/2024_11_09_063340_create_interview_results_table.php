<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewResultsTable extends Migration
{
    public function up()
    {
        Schema::create('interview_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id'); // Refers to interviews table
            $table->integer('score'); // Interview score
            $table->integer('correct_answers'); // Number of correct answers
            $table->integer('incorrect_answers'); // Number of incorrect answers
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interview_results');
    }
}
