<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResourceController extends Controller{

    // Metodo Get: Listar todos los modulos:
    public function indexModules(): JsonResponse
    {
        return response()->json(Module::all());
    }

    // Metodo Post: Crear un nuevo modulo:
    public function storeModule(Request $request): JsonResponse
    {
        $validated = $request->validate(
            [
                'codigo' => 'required|string|unique:modules,codigo',
                'nombre'=> 'required|string',
            ]
        );
        $module = Module::create($validated); // Validacion
        return response ()->json([ // Retorno en formato JSON
            'message' => 'Módulo creado con éxito.',
            'data'=> $module,
        ], 201); // 201: Creado
    }

    // Show: Visualizar modulo especifico:
    public function showModule(Module $module): JsonResponse{
        // Retorno en formato JSON
        return response()->json($module);
    }

    // Metodo Put: Actualizar un modulo:
    public function updateModule(Request $request, Module $module): JsonResponse {
        // Validacion
        $validated = $request->validate([
            'codigo' => 'required|string|unique:modules,codigo,'. $module->id,
            'nombre' => 'required|string',
        ]);
        // Actualizacion del modulo
        $module->update ($validated);
        // Retorno en formato JSON
        return response()->json([
            'message' => 'Módulo actualizado con éxito.',
            'data'=> $module,
        ]);
    }

    // Metodo Delete: Eliminar un modulo:
    public function destroyModule(Module $module): JsonResponse {
        //Eliminacion del modulo
        $module->delete();
        // Retorno en formato JSON
        return response()->json([
            'message' => 'Módulo eliminado con éxito.',
        ]);
    }

}
