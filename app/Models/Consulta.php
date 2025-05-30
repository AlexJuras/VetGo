<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'animal_id',
        'marcada_para',
        'motivo'
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