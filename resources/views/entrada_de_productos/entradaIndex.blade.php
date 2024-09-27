@extends('layout.plantilla')

@section('tituloPagina', 'Registro de entradas')

@section('contenido') 
<div class="card">
    <div class="card-header">Registro de entradas</div>
    <div class="card-body">
        <div class="row"> 
            {{-- <div class="col-sm-12">
                @if($mensaje = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
                @endif
            </div> --}}
        </div>

        <h5 class="card-title">Entrada de productos</h5>
        <p>
            <a href="{{ route('entrada_de_productos.create') }}" class="btn btn-primary">Registrar nueva entrada de producto</a>
        </p>
        
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                        <th>Fecha de entrada</th>
                        

                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->id }}</td>
                        <td>{{ $entrada->productos->nombre }}</td>
                        <td>{{ $entrada->cantidad }}</td>
                        <td>${{ $entrada->productos->precio }}</td>
                        <td>${{ $entrada->precio_total }}</td>
                        <td>{{ $entrada->created_at}}</td>
                      
                        
                    </tr>
                    @endforeach
                </tbody>       
            </table>
        {{$entradas->links()}}
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

