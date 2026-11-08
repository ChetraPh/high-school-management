<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_assignment_id')
                ->constrained('teacher_assignments')
                ->restrictOnDelete();

            $table->string('title', 150);
            $table->string('assessment_type', 50);
            $table->decimal('max_score', 8, 2)->default(100);
            $table->date('assessment_date');
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
