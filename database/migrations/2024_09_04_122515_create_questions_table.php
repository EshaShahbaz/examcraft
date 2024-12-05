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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->text('add_question_text');
            $table->enum('question_type', ['short', 'long'])->default('short');
            $table->enum('rating', ['normal', 'medium', 'hard'])->default('normal');
            $table->unsignedBigInteger('chapter_id');
            $table->foreign('chapter_id')->references('chapter_id')->on('chapters');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
