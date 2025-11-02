<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['cc', 'examen', 'tp', 'projet']); // CC=Contrôle Continu
            $table->string('name'); // Ex: "CC1", "Examen Final", "TP1"
            $table->decimal('score', 5, 2); // Note obtenue
            $table->decimal('max_score', 5, 2)->default(20); // Note maximale
            $table->decimal('coefficient', 3, 2)->default(1); // Coefficient
            $table->text('comment')->nullable();
            $table->date('graded_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};

