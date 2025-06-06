<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'especie',
        'data_nascimento',
        'detalhes',
        'status',
        'tutor_id',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Consulta::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'consultas');
    }
}