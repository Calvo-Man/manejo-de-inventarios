@extends('layout.plantilla')

@section('tituloPagina', 'Crear un nuevo producto')

@section('contenido') 
<div class="card">
    <h5 class="card-header">Agregar nuevp producto</h5>
    <div class="card-body">
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <option value="">Seleccione una categoria</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection

