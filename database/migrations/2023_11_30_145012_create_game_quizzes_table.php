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
        Schema::create('game_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('section_type')->nullable();
            $table->string('attemp_question')->nullable();
            $table->string('attemp_answer')->nullable();
            $table->string('points')->nullable();
            $table->string('correct')->nullable();
            $table->string('time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_quizzes');
    }
};
