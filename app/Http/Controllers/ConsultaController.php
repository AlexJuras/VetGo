<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        return Inertia::render('Consulta/Index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Consulta/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'clinic_id' => 'required',
            'animal_id' => 'required',
            'marcada_para' => 'required',
            'motivo' => 'nullable'
        ]);
        Consulta::create($request->all());
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
        return Inertia::render('Consulta/Edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'clinic_id' => 'required',
            'animal_id' => 'required',
            'marcada_para' => 'required',
            'motivo' => 'nullable'
        ]);

        $consulta->update($request->all());

        return redirect()->route('consultas.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
