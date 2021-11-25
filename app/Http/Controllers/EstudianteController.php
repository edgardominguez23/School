<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('created_at','desc')->paginate(10);

        return view("estudiante.index",['estudiantes'=>$estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::pluck('id','nombre');

        return view("estudiante.create",['estudiante' => new Estudiante(), 'materias'=> $materias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|integer|digits:9|unique:estudiantes',
            'carrera' => 'nullable|string',
            'creditos_cursados' => 'required|integer|min:0',
            'correo' => 'email|string|unique:estudiantes|nullable'
        ]);

        $estudiante = Estudiante::create($validated);

        $estudiante->materias()->sync($request->materias_id);

        return back()->with('status','Estudiante agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    { 
        $materias = Materia::pluck('id','nombre');

        return view("estudiante.show",["estudiante"=>$estudiante,"materias"=>$materias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        $materias = Materia::pluck('id','nombre');

        return view("estudiante.edit",["estudiante"=>$estudiante, 'materias'=> $materias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|integer|digits:9|unique:estudiantes,codigo,'.$estudiante->id,
            'carrera' => 'nullable|string',
            'creditos_cursados' => 'required|integer|min:0',
            'correo' => 'email|string|nullable|unique:estudiantes,correo,'.$estudiante->id
        ]);

        $estudiante->update($validated);

        $estudiante->materias()->sync($request->materias_id);

        return back()->with('status','Datos del estudiante actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return back()->with('status','Estudiante eliminado');
    }
}
