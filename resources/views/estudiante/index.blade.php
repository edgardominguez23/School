@extends('master')
@section('contenido')
<a class="btn btn-primary ml-5 mt-3 mb-4" href="{{route("estudiante.create")}}">Agregar Estudiante</a>

<div class="card ml-5 mr-5">
    <div class="card-header">
        <h4 class="card-title">Lista de estudiantes</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Codigo
                        </th>
                        <th>
                            Carrera
                        </th>
                        <th>
                            Creditos
                        </th>
                        <th>
                            Correo
                        </th>
                        <th class="text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estudiantes as $e)
                        <tr>
                            <td>
                                {{$e->id}}
                            </td>
                            <td>
                                {{$e->nombre}}
                            </td>
                            <td>
                                {{$e->codigo}}
                            </td>
                            <td>
                                {{$e->carrera}}
                            </td>
                            <td>
                                {{$e->creditos_cursados}}
                            </td>
                            <td>
                                {{$e->correo}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('estudiante.show',$e->id) }}" class="btn btn-primary mb-1">
                                    Lectura
                                </a>
                                <a href="{{ route('estudiante.edit',$e->id) }}" class="btn btn-primary mb-1">
                                    Actualizar
                                </a>
                                <form id="formDelete" action="{{ route('estudiante.destroy',$e->id )}}" data-action="{{ route('estudiante.destroy',$e->id )}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{$estudiantes->links('pagination::bootstrap-4')}}
@endsection