<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('interview_user_data', function (Blueprint $table) {
            $table->id();
            $table->string('interview_id')->nullable(); // VARCHAR for interview_id, nullable
            $table->json('skills')->nullable();         // JSON datatype for skills, nullable
            $table->json('marks_per_question')->nullable(); // JSON datatype for marks_per_question, nullable
            $table->integer('score')->nullable();
            $table->integer('correct_answers')->nullable();
            $table->integer('incorrect_answers')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('experienceLevel')->nullable();
            $table->string('name')->nullable();
            $table->string('role')->nullable();
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interview_user_data');
    }
};
