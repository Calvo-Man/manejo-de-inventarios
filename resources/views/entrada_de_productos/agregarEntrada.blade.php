@extends('layout.plantilla')

@section('tituloPagina', 'Registros')

@section('contenido') 
<div class="card">
    <h5 class="card-header">Registrar entrada de productos</h5>
    <div class="card-body">
        <form action="{{route('entrada_de_productos.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select class="form-control" id="producto_id" name="producto_id" required>
                    <option value="">Seleccione el producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('entrada_de_productos.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection

