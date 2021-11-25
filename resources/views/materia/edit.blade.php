@extends('master')
@section('contenido')

<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Actualizar Materia {{$materia->nombre}}</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <form action="{{ route( "materias.update", $materia->id)}}" method="post">
            @method('put')
            @include('materia._form')
        </form>
    </div>
</div>

@endsection