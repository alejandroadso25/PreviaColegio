<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'expediente',
        'delegado_id',
        'imagen', // Atributo para foto
    ];

    // Configuración de la fecha año/mes/dia
    protected $casts = [
        'fecha_nacimiento' => 'date:Y-m-d',
    ];

    public function modules () {
        // Un estudiante puede estar en varios modulos

        return $this->belongsToMany( // Muchos a muchos
            Module::class,
            'module_students',
            'student_id',
            'module_id'
        )->withTimestamps(); // Para cargar img (permite actualizar)
    }

    public function delegado() {
        // Un estudiante puede tener un delegado
        return $this->belongsTo(Student::class, 'delegado_id');    
    }

    public function alumnosDelegados() {
        // Estudiantes representados por un alumno delegado
        return $this->hasMany(Student::class, 'delegado_id');
    }
}
