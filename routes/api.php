<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalApiController;
// use App\Http\Controllers\ConsultaApiController;
// use App\Http\Controllers\TutorApiController;
// use App\Http\Controllers\EstudanteApiController;

// Exemplo de rota pública
Route::get('/animais', [AnimalApiController::class, 'index']);
Route::get('/animais/{id}', [AnimalApiController::class, 'show']);

// Route::get('/consultas', [ConsultaApiController::class, 'index']);

// Route::get('/tutores', [TutorApiController::class, 'index']);

// Route::get('/estudantes', [EstudanteApiController::class, 'index']);

// Exemplo de rota protegida (autenticação via Sanctum ou Passport)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/consultas', [ConsultaController::class, 'store']);
//     Route::put('/consultas/{id}', [ConsultaController::class, 'update']);
//     Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);
//     // Outras rotas protegidas...
// });

