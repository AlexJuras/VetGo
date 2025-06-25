<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalApiController extends Controller
{
    public function index()
    {
        
        return Animal::with('tutor')->get();
    }
    
    public function show($id)
    {
        return Animal::with('tutor')->findOrFail($id);
    }
}
