<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\InteraccionController;
use App\Http\Controllers\PerroController;

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

Route::prefix('/perro')->group(function () {
    Route::post('registrar', [PerroController::class, 'crearPerro']);
    Route::get('listar', [PerroController::class, 'listarPerro']);
    Route::get('mostrar/{id}', [PerroController::class, 'mostrarPerro']);
    Route::put('actualizar/{id}', [PerroController::class, 'actualizarPerro']);
    Route::delete('borrar/{id}', [PerroController::class, 'borrarPerro']);
});

Route::prefix('/interaccion')->group(function () {
    Route::post('registrar', [InteraccionController::class, 'crearInteraccion']);
    Route::get('listar', [InteraccionController::class, 'listarInteraccion']);
    Route::get('mostrar/{id}', [InteraccionController::class, 'mostrarInteraccion']);
    Route::put('actualizar/{id}', [InteraccionController::class, 'actualizarInteraccion']);
    Route::delete('borrar/{id}', [InteraccionController::class, 'borrarInteraccion']);

    Route::get('grupoID/{id}', [InteraccionController::class, 'grupoID']);
    

});
