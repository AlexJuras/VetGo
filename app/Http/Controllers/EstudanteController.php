<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;
use Inertia\Inertia;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = Estudante::all();
        return Inertia::render('Estudante/Index', compact('estudantes'));
    }

    public function create()
    {
        return Inertia::render('Estudante/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:estudantes',
            'phone' => 'nullable'
        ]);

        Estudante::create($request->all());

        return redirect()->route('estudantes.index');
    }

    public function show(Estudante $estudante)
    {
        return Inertia::render('Estudante/Show', compact('estudante'));
    }

    public function edit(Estudante $estudante)
    {
        return Inertia::render('Estudante/Edit', compact('estudante'));
    }

    public function update(Request $request, Estudante $estudante)
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:estudantes,cpf,'.$estudante->id,
            'phone' => 'nullable'
        ]);

        $estudante->update($request->all());

        return redirect()->route('estudantes.index');
    }

    public function destroy(Estudante $estudante)
    {
        $estudante->delete();
        return redirect()->route('estudantes.index');
    }
}
