<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Refers to users table
            $table->unsignedBigInteger('role_id'); // Refers to roles table
            $table->json('selected_skills'); // Array of selected skill IDs
            $table->unsignedBigInteger('level_id'); // Refers to levels table
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Interview status
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interviews');
    }
}
