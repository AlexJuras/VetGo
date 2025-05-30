<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'endereco', 'telefone'];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function estudantes()
    {
        return $this->hasMany(Estudante::class);
    }

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'consultas');
    }
}