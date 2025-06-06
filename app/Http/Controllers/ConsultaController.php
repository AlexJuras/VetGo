<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Consulta;
use App\Models\Estudante;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::with(['animal', 'animal.tutor', 'estudante'])
            ->orderBy('data_consulta', 'desc')
            ->orderBy('horario', 'desc')
            ->get();

        $consultas = $consultas->map(function ($consulta) {
            return [
                'id' => $consulta->id,
                'animal' => $consulta->animal ? $consulta->animal->nome : null,
                'tutor' => $consulta->animal && $consulta->animal->tutor ? $consulta->animal->tutor->nome : null,
                'estudante' => $consulta->estudante ? $consulta->estudante->nome : null,
                'data_consulta' => $consulta->data_consulta,
                'horario' => $consulta->horario,
                'valor' => $consulta->valor,
                'forma_pagamento' => $consulta->forma_pagamento,
                'tipo_consulta' => $consulta->tipo_consulta,
                'status' => strtolower($consulta->status),
                'observacoes' => $consulta->observacoes,
            ];
        });

        return Inertia::render('Consulta/Index', [
            'consultas' => $consultas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tutors = Tutor::all();
        $animals = Animal::all();
        $estudantes = Estudante::all();
        return Inertia::render('Consulta/Create', [
            'tutores' => $tutors,
            'animals' => $animals,
            'estudantes' => $estudantes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tutor_id' => 'nullable',
            'animal_id' => 'required',
            'estudante_id' => 'required',
            'data_consulta' => 'required',
            'horario' => 'required',
            'valor' => 'nullable',
            'forma_pagamento' => 'nullable',
            'tipo_consulta' => 'nullable',
            'observacoes' => 'nullable'
        ]);
        Consulta::create($validated);
        return redirect()->route('consultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        $consulta->load(['animal', 'animal.tutor', 'estudante']);

        return Inertia::render('Consulta/Edit', [
            'consulta' => $consulta,
            'tutores' => Tutor::all(),
            'animals' => Animal::all(),
            'estudantes' => Estudante::all(),
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $validated = $request->validate([
            'clinic_id' => 'nullable',
            'tutor_id' => 'nullable',
            'animal_id' => 'required',
            'estudante_id' => 'nullable',
            'data' => 'required',
            'horario' => 'required',
            'valor' => 'nullable',
            'forma_pagamento' => 'nullable',
            'tipo' => 'required',
            'observacoes' => 'nullable'
        ]);

        $consulta->update($validated);

        return redirect()->route('consultas.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cancelar($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->status = 'cancelada';
        $consulta->save();

        return redirect()->route('consultas.index')->with('success', 'Consulta cancelada com sucesso!');
    }
}