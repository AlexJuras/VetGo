<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use Inertia\Inertia;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::with('animals')->get();
        return Inertia::render('Tutor/Index', compact('tutors'));
    }

    public function create()
    {
        return Inertia::render('Tutor/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:tutors',
            'telefone' => 'nullable',
            'data_nascimento' => 'nullable|date',
            'email' => 'nullable|email',
            'genero' => 'nullable|string',
            'cidade' => 'nullable|string',
            'estado' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        Tutor::create($request->all());

        return redirect()->route('tutors.index')->with('success', 'Tutor cadastrado!');
    }

    public function show(Tutor $tutor)
    {
        return Inertia::render('Tutor/Show', compact('tutor'));
    }

    public function edit(Tutor $tutor)
    {
        return Inertia::render('Tutor/Edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:tutors,cpf,'.$tutor->id,
            'telefone' => 'nullable',
            'data_nascimento' => 'nullable|date',
            'email' => 'nullable|email',
            'genero' => 'nullable|string',
            'cidade' => 'nullable|string',
            'estado' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        $tutor->update($request->all());

        return redirect()->route('tutors.index');
    }

    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('tutors.index');
    }
}
