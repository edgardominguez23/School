@extends('master')
@section('contenido')

<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Actualizar Estudiante {{$estudiante->nombre}}</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <form action="{{ route( "estudiante.update", $estudiante->id)}}" method="post">
            @method('put')
            @include('estudiante._form')
        </form>
    </div>
</div>

@endsection