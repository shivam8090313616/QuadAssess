<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('country')->nullable();
        $table->string('state')->nullable();
        $table->string('account_type')->default('Student');
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->string('designation')->nullable();
        $table->string('position')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'country', 'state', 'account_type', 'phone', 'address', 'designation', 'position'
        ]);
    });
}

};
