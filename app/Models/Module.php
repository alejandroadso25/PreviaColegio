<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function teachers () {
        // Un modulo puede tener varios profesores
        return $this->belongsToMany(
            Teacher::class,
            'module_teachers',
            'module_id',
            'teacher_id'
        )->withTimestamps(); // Actualiza
    }

    public function students () {
        // Un modulo puede tener varios alumnos
        return $this->belongsToMany(
            Student::class,
            'module_students',
            'module_id',
            'student_id'
        )->withTimestamps(); // Actualiza
    }
}
