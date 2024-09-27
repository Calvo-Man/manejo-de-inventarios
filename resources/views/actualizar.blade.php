@extends('layout.plantilla')

@section('tituloPagina', 'Actualizar Registro')

@section('contenido')

<h5 class="card-header">Actualizar persona</h5>

<div class="card-body">

    <p class="card-text">
        <form action="{{ route('personas.update', $personas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="foto">Foto</label>
            @if($personas->foto)
                <div>
                    <img src="{{ asset('storage/fotos/' . $personas->foto) }}" alt="Foto de {{ $personas->nombre }}" style="width: 100px; height: 100px;">
                </div>
            @endif
            <input type="file" name="foto" class="form-control">

            <label for="paterno">Apellido paterno</label>

            <input type="text" name="paterno" value="{{ $personas->paterno}}" class="form-control" required>

            <label for="materno">Apellido Materno</label>
            <input type="text" name="materno" value="{{ $personas->materno }}" class="form-control" required>

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{ $personas->nombre }}" class="form-control" required>

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" value="{{ $personas->fecha_nacimiento }}" class="form-control" required>
            <br>
            <a href="{{ route('personas.index') }}" class="btn btn-secondary">Regresar</a> 
        
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
        
    </p>
</div>
@endsection
