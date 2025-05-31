<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ClinicController, AnimalController, ConsultaController, EstudanteController, TutorController};
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1);
    return Inertia::render('Home');
})->name('home');

Route::inertia('/vetgo', 'VetGo', ['faculdade' => 'Uninassau'])->name('vetgo');
Route::inertia('/cadastrar', 'Auth/Cadastrar',['title' => 'Cadastrar'])->name('cadastrar');

Route::middleware(['auth'])->group(function () {
    Route::resource('clinics', ClinicController::class);
    Route::resource('animals', AnimalController::class);
    Route::resource('tutors', TutorController::class);
    Route::resource('estudantes', EstudanteController::class);
    Route::resource('consultas', ConsultaController::class);
});


// Com o Inertia eu posso fazer a rota acima. Cada valor representa algo:
// 1º valor: URL
// 2º valor: Componente
// 3º valor: Dados
// É o mesmo que escrever da forma abaixo
// Route::get('/vetgo', function () {
//     return inertia('VetGo', ['faculdade'=> 'Uninassau']);
// });
