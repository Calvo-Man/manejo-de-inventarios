@extends('layout.plantilla')

@section('tituloPagina', 'Registro de ventas')

@section('contenido') 
<div class="card">
    <div class="card-header">Registro de ventas</div>
    <div class="card-body">

        <h5 class="card-title">Venta de productos</h5>
        <p>
            <a href="{{ route('ventas.create') }}" class="btn btn-primary">Registrar nueva venta de producto</a>
        </p>
        
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>ID producto</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                        <th>Fecha de venta</th>
                        <th>Cliente</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->productos->nombre }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>${{ $venta->productos->precio }}</td>
                        <td>${{ $venta->precio_total }}</td>
                        <td>{{ $venta->created_at}}</td> 
                    </tr>
                    @endforeach
                </tbody>       
            </table>
        {{$ventas->links()}}
        </div>
    </div>
</div>

<div class="row mt-3">
    <h1></h1>
    <div class="ml-auto">
        
        <a href="{{ route('personas.index') }}" class="btn btn-primary mr-2">Volver</a>
        <a href="{{route('inventarios.index')}}" class="btn btn-success mr-2">Ver inventario</a>
    </div>
</div>
@endsection




