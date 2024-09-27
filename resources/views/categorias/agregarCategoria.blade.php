@extends('layout.plantilla')

@section('tituloPagina', 'Crear un nueva categoria')

@section('contenido') 
<div class="card">
    <h5 class="card-header">Agregar nueva categoria</h5>
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection

