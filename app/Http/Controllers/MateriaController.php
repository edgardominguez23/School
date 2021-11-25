<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::orderBy('created_at','desc')->paginate(10);

        return view("materia.index",['materias'=>$materias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("materia.create",['materia' => new Materia()]);
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
            'creditos' => 'required|integer|min:1',
            'nombre' => 'required|string|min:2',
            'profesor' => 'required|string',
            'turno' => 'required|string',
            'disponible' => 'required|boolean'
        ]);

        $materia = Materia::create($validated);

        return back()->with('status','Materia agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        $estudiantes = Estudiante::pluck('id','nombre');

        return view("materia.show",["materia"=>$materia,"estudiantes"=>$estudiantes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        return view("materia.edit",["materia"=>$materia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        $validated = $request->validate([
            'creditos' => 'required|integer|min:1',
            'nombre' => 'required|string|min:2',
            'profesor' => 'required|string',
            'turno' => 'required|string',
            'disponible' => 'required|boolean'
        ]);

        $materia->update($validated);

        return back()->with('status','Datos de la materia estan actualizadas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        $materia->delete();
        return back()->with('status','Materia eliminada');
    }
}
