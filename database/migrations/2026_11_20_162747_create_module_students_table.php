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
        Schema::create('module_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('module_id');

            // Campo para evitar estudiantes y modulos duplicados:
            $table->unique(['student_id', 'module_id']);

            // Se llaman atributos foraneos:
            $table->foreign('student_id')->references('id')->on('students')
            ->onDelete('cascade');

            $table->foreign('module_id')->references('id')->on('modules')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_students');
    }
};
