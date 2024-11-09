<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminActionsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('interview_id'); // Refers to the interview
            $table->unsignedBigInteger('admin_id'); // Refers to admin
            $table->enum('action_type', ['approve', 'reject', 'reviewed']); // Type of action taken by admin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_actions');
    }
}
