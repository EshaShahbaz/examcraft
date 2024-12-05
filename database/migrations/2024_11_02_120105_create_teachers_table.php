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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('teacher_id');
            $table->string('profile_image')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('province');
            $table->string('city');
            $table->date('dob');
            $table->string('address');
            $table->json('education');   // Stores an array as JSON
            $table->json('institutes');  // Stores an array as JSON
            $table->json('company');     // Stores an array as JSON
            $table->json('subjects');    // Stores an array as JSON
            $table->string('profession');
            $table->json('experience');  // Stores an array as JSON
            $table->json('position');    // Stores an array as JSON
            $table->json('duration');    // Stores an array as JSON
            $table->json('from');        // Stores an array of time slots as JSON
            $table->json('to');          // Stores an array of time slots as JSON
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->unsignedBigInteger('id')->unique();
            $table->foreign('id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
