<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('interview_results', function (Blueprint $table) {
            // Add the marks_per_question column after incorrect_answers
            $table->json('marks_per_question')->nullable()->after('incorrect_answers'); 
        });
    }

    public function down()
    {
        Schema::table('interview_results', function (Blueprint $table) {
            // Remove the marks_per_question column
            $table->dropColumn('marks_per_question');
        });
    }
};
