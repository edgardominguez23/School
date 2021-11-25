@extends('master')
@section('contenido')

<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Agregar Estudiante</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <form action="{{ route( "estudiante.store" )}}" method="post">
            @include('estudiante._form')
        </form>
    </div>
</div>

@endsection