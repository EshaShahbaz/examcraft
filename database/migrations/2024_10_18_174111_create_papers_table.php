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
        Schema::create('papers', function (Blueprint $table) {
            $table->id('paper_id');
            $table->string('yearname');
            $table->string('subjectname');
            $table->string('name_of_institute');
            $table->string('title_of_test');
            $table->integer('total_marks');
            $table->string('duration');
            $table->json('chapters');
            $table->json('shortQquestions');
            $table->json('longQuestions');
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
        Schema::dropIfExists('papers');
    }
};
