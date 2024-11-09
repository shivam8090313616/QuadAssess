<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interviewusers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();  // For storing the email, with uniqueness constraint
            $table->enum('experienceLevel', ['1', '2', '3']);  // Enum for experience level with predefined values
            $table->string('name');  // For storing name
            $table->string('role');  // For storing role
            $table->json('skills');  // JSON column for skills (array of strings)
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviewusers');
    }
};
