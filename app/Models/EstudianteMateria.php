<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteMateria extends Model
{
    protected $fillable = [
        'estudiante_id',
        'materia_id',
    ];
}
