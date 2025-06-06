<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'estudante_id',
        'data_consulta',
        'horario',
        'valor',
        'forma_pagamento',
        'tipo_consulta',
        'status',
        'observacoes',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function estudante()
    {
        return $this->belongsTo(Estudante::class);
    }
}