<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'data_nascimento',
        'email',
        'genero',
        'cidade',
        'estado',
        'observacoes',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}