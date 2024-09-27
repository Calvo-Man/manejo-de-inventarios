@extends('layout.plantilla')

@section('tituloPagina', 'Ventas')

@section('contenido') 
<div class="card">
    <h5 class="card-header">Realizar venta</h5>
    <div class="card-body">
        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="producto_id">Producto</label>
                <select class="form-control" id="producto_id" name="producto_id" required>
                    <option value="" >Seleccione el producto</option>
                    @foreach($inventarios as $inventario)
                        <option value="{{ $inventario->productos->id }}">{{ $inventario->productos->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            @if ($errors->has('cantidad'))
                 <span class="text-danger">{{ $errors->first('cantidad') }}</span>
            @endif
            <div class="form-group">
                <label for="producto_id">Cliente</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    <option value="">Seleccione el cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre}} {{$cliente->paterno}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</div>
@endsection

