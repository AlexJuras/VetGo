<?php

use App\Http\Controllers\Auth\{CadastroController, LoginController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ClinicController, AnimalController, ConsultaController, EstudanteController, TutorController, UserController};
use Inertia\Inertia;

Route::inertia('/vetgo', 'VetGo')->name('vetgo');
Route::inertia('/cadastrar', 'Auth/Cadastrar')->name('cadastrar');
Route::inertia('/login', 'Auth/Login')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/cadastro', [CadastroController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::resource('animals', AnimalController::class);
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::resource('clinics', ClinicController::class);
    Route::get('/clinics/create', [ClinicController::class, 'create'])->name('clinics.create');
    Route::get('/clinics/{clinic}/edit', [ClinicController::class, 'edit'])->name('clinics.edit');
    Route::resource('tutors', TutorController::class);
    Route::get('/tutors/create', [TutorController::class, 'create'])->name('tutors.create');
    Route::get('/tutors/{tutor}/edit', [TutorController::class, 'edit'])->name('tutors.edit');
    Route::resource('estudantes', EstudanteController::class);
    Route::get('/estudantes/create', [EstudanteController::class, 'create'])->name('estudantes.create');
    Route::get('/estudantes/{estudante}/edit', [EstudanteController::class, 'edit'])->name('estudantes.edit');
    Route::resource('consultas', ConsultaController::class);
    Route::get('/consultas/create', [ConsultaController::class, 'create'])->name('consultas.create');
    Route::get('/consultas/{consulta}/edit', [ConsultaController::class, 'edit'])->name('consultas.edit');
    Route::resource('users', UserController::class);
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/', function () {
        return Inertia::render('Home');
    })->name('home');
});

// Com o Inertia eu posso fazer a rota acima:
// 1º valor: URL
// 2º valor: Componente
// 3º valor: Dados
// É o mesmo que escrever da forma abaixo
// Route::get('/vetgo', function () {
//     return inertia('VetGo', ['faculdade'=> 'Uninassau']);
// });
