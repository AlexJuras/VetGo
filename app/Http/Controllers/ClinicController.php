<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Clinic;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $clinics = Clinic::all();
        return Inertia::render('Clinic/Index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Clinic/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'nullable'
        ]);

        Clinic::create($request->all());

        return redirect()->route('clinics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clinic $clinic) //Binding de Modelo Implícito
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clinic $clinic)
    {
        return Inertia::render('Clinic/Edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clinic $clinic)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'telefone' => 'nullable'
        ]);

        $clinic->update($request->all());

        return redirect()->route('clinics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clínica excluída com sucesso!');
    }
}
