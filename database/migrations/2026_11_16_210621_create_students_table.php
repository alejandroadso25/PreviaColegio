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
        Schema::create('students', function (Blueprint $table) {
           $table->id();
           $table->string('nombre');
           $table->string('apellido');
           $table->date('fecha_nacimiento'); // Atributo date para fechas
           $table->string('expediente');

           // Atributo foraneo para alumno-delegado:
           $table->unsignedBigInteger('delegado_id')->nullable(); // Nullable porque un alumno no puede tener delegado
            
           // Se llama el atributo foraneo:
            $table->foreign('delegado_id')->references('id')->
            on('students')->onDelete('set null');

           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
