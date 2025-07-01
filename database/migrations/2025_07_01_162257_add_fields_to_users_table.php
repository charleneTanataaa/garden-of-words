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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('selected_flower_id');
            $table->date('flower_start_date')->nullable();
            $table->string('otp_code')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->foreign('selected_flower_id')->references('id')->on('flowers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
