<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteMateriaController extends Controller
{
    public function index()
    {
        return view("estudiante-materia");
    }
}
