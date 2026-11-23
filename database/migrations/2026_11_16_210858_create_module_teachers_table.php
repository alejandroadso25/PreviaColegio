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
        Schema::create('module_teachers', function (Blueprint $table) {
            $table->id();
            // Declaracion de atributos foraneos:
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('teacher_id');

            // Llamada del atributo:
            $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('cascade');

            $table->foreign('teacher_id')->references('id')->on('teachers')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_teachers');
    }
};
