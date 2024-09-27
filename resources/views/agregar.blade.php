@extends('layout.plantilla')

@section('tituloPagina', 'Crear un nuevo registro Registro')

@section('contenido') 
<div class="card">
    <h5 class="card-header">Agregar nueva persona</h5>
    <div class="card-body">
        <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Campo para la foto -->
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <!-- Campos para los datos personales -->
            <div class="form-group">
                <label for="paterno">Apellido paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>

            <div class="form-group">
                <label for="materno">Apellido Materno</label>
                <input type="text" class="form-control" id="materno" name="materno" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('personas.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection

