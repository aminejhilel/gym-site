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
        Schema::create('training_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('coach_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('duration_weeks')->default(4);
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('exercise_training_program', function (Blueprint $table) {
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->foreignId('training_program_id')->constrained()->cascadeOnDelete();
            $table->integer('sets')->default(3);
            $table->integer('reps')->default(10);
            $table->integer('order')->default(0);
            $table->primary(['exercise_id', 'training_program_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_training_program');
        Schema::dropIfExists('training_programs');
    }
};
