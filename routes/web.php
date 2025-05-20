<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});


Route::inertia('/vetgo', 'VetGo', ['faculdade'=> 'Uninassau']);
// Com o Inertia eu posso fazer a rota acima. Cada valor representa algo:
// 1º valor: URL
// 2º valor: Componente
// 3º valor: Dados
// É o mesmo que escrever da forma abaixo
// Route::get('/vetgo', function () {
//     return inertia('VetGo', ['faculdade'=> 'Uninassau']);
// });
