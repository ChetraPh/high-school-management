<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_assignments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->restrictOnDelete();

            $table->foreignId('class_subject_id')
                ->constrained('class_subjects')
                ->restrictOnDelete();

            $table->date('assigned_from')->nullable();
            $table->date('assigned_until')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(['teacher_id', 'class_subject_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_assignments');
    }
};
