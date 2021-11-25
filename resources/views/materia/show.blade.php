@extends('master')
@section('contenido')
    
<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Materia</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <p>Creditos: {{$materia->creditos}}</p>
        <p>Nombre: {{$materia->nombre}}</p>
        <p>Profesor: {{$materia->profesor}}</p>
        <p>Turno: {{$materia->turno}}</p>
        <p>Disponible: {{$materia->disponible}}</p>
        <p>Estudiantes</p>
        <ol>
            @foreach ($materia->estudiantes as $e)
                <li>{{$e->nombre}}</li>
            @endforeach
        </ol>   
    </div>
</div>

@endsection