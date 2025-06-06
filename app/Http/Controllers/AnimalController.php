<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $clinics = Animal::all(); //----------------------Adaptar quando tiver o model e controller Clinic configurados corretamente
        // return Inertia::render('Animal/Index', compact('animals'));
        $animals = Animal::with('tutor')->get();
        return inertia('Animal/Index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tutors = Tutor::all();
        return Inertia::render('Animal/Create', [
            'tutors' => $tutors
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'detalhes' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'tutor_id' => 'required|exists:tutors,id'
        ]);

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'Cadastro realizado!.');
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
        $tutors = Tutor::all();
        return Inertia::render('Animal/Edit', [
            'animal' => $animal,
            'tutors' => $tutors
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'detalhes' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'tutor_id' => 'nullable|exists:tutors,id'
        ]);

        $animal->update($validated);
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
