@extends('layout.plantilla')

@section('tituloPagina', 'Categorias')

@section('contenido') 
<div class="card">
    <div class="card-header">Categorias</div>
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

        <h5 class="card-title">Categorias de categorias</h5>
        <p>
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">Agregar una nueva categoria</a>
        </p>
        
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>ID</th> <!-- Agregar columna de 'Foto' -->
                        <th>Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                       
                        
                        <td>
                            <a href="{{ route('personas.edit', $categoria->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-edit"></i> Editar
                            </a>
                        </td>
                        <td>    
                            <a href="{{ route('personas.show', $categoria) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>       
            </table>
        {{-- {{$personas->links()}} --}}
        </div>
    </div>
</div>

<div class="row mt-3">
    <h1></h1>
    <div class="ml-auto">
        <a href="{{ route('personas.create') }}" class="btn btn-success mr-2">Nuevo registro</a>
        <a href="{{ route('personas.index') }}" class="btn btn-primary mr-2">Volver</a>
    </div>
</div>
@endsection

@section('footer')
    <h1></h1>
@endsection

@section('datos')
    <h1>Otra sección</h1>
@endsection
