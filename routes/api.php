<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ResourceController; // Importar el controlador del crud

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas Crud para modulos:
Route::get('/modules', [ResourceController::class, 'indexModules']); // Listar Modulos
Route::post('/modules', [ResourceController::class, 'storeModule']); // Crear Modulo
Route::get('/modules/{module}', [ResourceController::class, 'showModule']); // Visualizar Modulo especifico
Route::put('/modules/{module}', [ResourceController::class, 'updateModule']); // Actualizar Modulo
Route::delete('/modules/{module}', [ResourceController::class, 'destroyModule']); // Eliminar Modulo

// Rutas Crud para profesores:
Route::get('/teachers', [ResourceController::class, 'indexTeacher']); // Listar Profesores
Route::post('/teachers', [ResourceController::class, 'storeTeacher']); // Crear Profesor
Route::get('/teachers/{teacher}', [ResourceController::class, 'showTeacher']); // Visualizar Profesor especifico
Route::put('/teachers/{teacher}', [ResourceController::class, 'updateTeacher']); // Actualizar Profesor
Route::delete('/teachers/{teacher}', [ResourceController::class, 'destroyTeacher']); // Eliminar Profesor

// Rutas Crud para estudiantes:
Route::get('/students', [ResourceController::class, 'indexStudent']); // Listar Estudiantes
Route::post('/students', [ResourceController::class, 'storeStudent']); // Crear Estudiante
Route::get('/students/{student}', [ResourceController::class, 'showStudent']); // Visualizar Estudiante especifico
Route::put('/students/{student}', [ResourceController::class, 'updateStudent']); // Actualizar Estudiante
Route::delete('/students/{student}', [ResourceController::class, 'destroyStudent']); // Eliminar Estudiante

// Ruta para asignar profesores a un modulo:
Route::put('/modules/{module}/teachers', [ResourceController::class, 'assignTeachers']);

// Ruta para matricular estudiantes en un modulo:
Route::put('/students/{student}/modules', [ResourceController::class, 'assignModulesToStudent']);