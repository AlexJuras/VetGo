<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'matricula'
    ];

    // public function clinic()
    // {
    //     return $this->belongsTo(Clinic::class);
    // }

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}