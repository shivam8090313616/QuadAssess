<?php

use  Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankCardsTable extends Migration
{
    public function up()
    {
        Schema::create('rank_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_result_id'); // Refers to interview_results table
            $table->enum('status', ['pending', 'approved'])->default('pending'); // Rank card status
            $table->integer('final_score'); // Final calculated score
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rank_cards');
    }
}
