@extends('master')
@section('contenido')
    
<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Estudiante</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <p>Nombre: {{$estudiante->nombre}}</p>
        <p>Codigo: {{$estudiante->codigo}}</p>
        <p>Carrera: {{$estudiante->carrera}}</p>
        <p>Creditos: {{$estudiante->creditos_cursados}}</p>
        <p>Correo: {{$estudiante->correo}}</p>
        <p>Materias</p>
        <ol>
            @foreach ($estudiante->materias as $m)
                <li>{{$m->nombre}}</li>
            @endforeach
        </ol>         
    </div>
</div>

@endsection