@csrf

<div class="form-group">
    <label for="creditos">Creditos</label>
    <input id="creditos" class="form-control" type="text" name="creditos" value="{{ old('nombre',$materia->creditos) }}">
    @error('creditos')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input id="nombre" class="form-control" type="text" name="nombre" value="{{ old('nombre',$materia->nombre) }}">
    @error('nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="profesor">Profesor</label>
    <input id="profesor" class="form-control" type="text" name="profesor" value="{{ old('nombre',$materia->profesor) }}">
    @error('profesor')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="turno">Turno</label>
    <input id="turno" class="form-control" type="text" name="turno" value="{{ old('nombre',$materia->turno) }}">
    @error('turno')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <label for="disponible">Disponible</label>
    <select class="form-control" name="disponible" id="disponible">
        <option {{$materia->disponible == 0 ? 'selected="selected"' : ''}} value="0">No</option>
        <option {{$materia->disponible == 1 ? 'selected="selected"' : ''}} value="1">Si</option>
    </select>
    @error('disponible')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<input type="submit" value="Enviar" class="btn btn-primary">