@extends('layout.plantilla')

@section('tituloPagina', 'Registro de inventarios')

@section('contenido') 
<div class="card">
    <div class="card-header">Registro de inventarios</div>
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

        <h5 class="card-title">inventario de productos</h5>
        
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        
                        
                              
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventarios as $inventario)
                    <tr>
                        <td>{{ $inventario->id }}</td>
                        <td>{{ $inventario->productos->nombre }}</td>
                        <td>{{ $inventario->cantidad_disponible }}</td>
                        <td>${{ $inventario->productos->precio }}</td>
                        <td>
                            <a href="{{ route('ventas.create', $inventario->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-cash-register"></i> Vender
                            </a>
                        </td>
                      
                        
                    </tr>
                    @endforeach
                </tbody>       
            </table>
        {{$inventarios->links()}}
        </div>
    </div>
</div>

<div class="row mt-3">
    <h1></h1>
    <div class="ml-auto">
        
        <a href="{{ route('personas.index') }}" class="btn btn-primary mr-2">Volver</a>
    </div>
</div>
@endsection

@section('footer')
    <h1></h1>
@endsection

