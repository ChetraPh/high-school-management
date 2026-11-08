<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assessment_id')
                ->constrained('assessments')
                ->restrictOnDelete();

            $table->foreignId('enrollment_id')
                ->constrained('enrollments')
                ->restrictOnDelete();

            $table->foreignId('grading_scale_id')
                ->nullable()
                ->constrained('grading_scales')
                ->nullOnDelete();

            $table->decimal('score', 8, 2);
            $table->string('grade', 5)->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->unique(['assessment_id', 'enrollment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
};
