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

