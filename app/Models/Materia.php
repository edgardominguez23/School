<?php

namespace App\Models;

use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'creditos',
        'nombre',
        'profesor',
        'turno',
        'disponible'
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }
}
