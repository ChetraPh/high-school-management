<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grading_scales', function (Blueprint $table) {
            $table->id();

            $table->string('grade', 5);
            $table->decimal('min_score', 5, 2);
            $table->decimal('max_score', 5, 2);
            $table->string('remark', 100)->nullable();

            $table->timestamps();

            $table->unique('grade');
            $table->index(['min_score', 'max_score']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grading_scales');
    }
};
