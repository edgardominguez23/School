@extends('master')
@section('contenido')
<a class="btn btn-primary ml-5 mt-3 mb-4" href="{{route("materias.create")}}">Agregar Materia</a>

<div class="card ml-5 mr-5">
    <div class="card-header">
        <h4 class="card-title">Lista de materias</h4>
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
                            Creditos
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Profesor
                        </th>
                        <th>
                            Turno
                        </th>
                        <th>
                            Disponible
                        </th>
                        <th class="text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materias as $m)
                        <tr>
                            <td>
                                {{$m->id}}
                            </td>
                            <td>
                                {{$m->creditos}}
                            </td>
                            <td>
                                {{$m->nombre}}
                            </td>
                            <td>
                                {{$m->profesor}}
                            </td>
                            <td>
                                {{$m->turno}}
                            </td>
                            <td>
                                {{$m->disponible == 1 ? "Si" : "No"}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('materias.show',$m->id) }}" class="btn btn-primary mb-1">
                                    Lectura
                                </a>
                                <a href="{{ route('materias.edit',$m->id) }}" class="btn btn-primary mb-1">
                                    Actualizar
                                </a>
                                <form id="formDelete" action="{{ route('materias.destroy',$m->id )}}" data-action="{{ route('materias.destroy',$m->id )}}" method="post">
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

{{$materias->links('pagination::bootstrap-4')}}
@endsection