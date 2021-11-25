@extends('master')
@section('contenido')

<div class="card">
    <div class="card-header ml-5 mr-5">
        <h4 class="card-title">Agregar Materia</h4>
    </div>
    <div class="card-body ml-5 mr-5">
        <form action="{{ route( "materias.store" )}}" method="post">
            @include('materia._form')
        </form>
    </div>
</div>

@endsection