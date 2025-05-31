<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinics = Animal::all();
        return Inertia::render('Animal/Index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Animal/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'especie' => 'required',
            'raca' => 'nullable',
            'data_nascimento' => 'nullable',
            'dono_id' => 'required'
        ]);

        Animal::create($request->all());

        return redirect()->route('animal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        return Inertia::render('Animal/Edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required',
            'especie' => 'required',
            'raca' => 'nullable',
            'data_nascimento' => 'nullable',
            'dono_id' => 'required'
        ]);

        $animal->update($request->all());
        return redirect()->route('animals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animals.index');
    }
}
