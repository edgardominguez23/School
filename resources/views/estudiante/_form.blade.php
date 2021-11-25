@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input id="nombre" class="form-control" type="text" name="nombre" value="{{ old('nombre',$estudiante->nombre) }}">
    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="codigo">Codigo</label>
    <input id="codigo" class="form-control" type="number" name="codigo" value="{{ old('codigo',$estudiante->codigo) }}">
    @error('codigo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="carrera">Carrera</label>
    <input id="carrera" class="form-control" type="text" name="carrera"  value="{{ old('carrera',$estudiante->carrera) }}">
    @error('carrera')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="creditos_cursados">Creditos</label>
    <input id="creditos_cursados" class="form-control" type="number" name="creditos_cursados" value="{{ old('creditos_cursados',$estudiante->creditos_cursados) }}">
    @error('creditos_cursados')
        <small class="text-danger">{{$message}}</small>
    @enderror   
</div>

<div class="form-group">
    <label for="correo">Correo</label>
    <input id="correo" class="form-control" type="text" name="correo" value="{{ old('correo',$estudiante->correo) }}">
    @error('correo')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="category_id">Materias</label>
    <select multiple class="form-control" name="materias_id[]" id="materias_id">
        @foreach ($materias as $nombre => $id)
            <option {{in_array($id, old('materias_id') ?: $estudiante->materias->pluck("id")->toArray()) ? "selected" : ""}} value="{{$id}}">{{$nombre}}</option>
        @endforeach
    </select>
    
</div>

<input type="submit" value="Enviar" class="btn btn-primary">