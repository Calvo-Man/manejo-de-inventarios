@extends('layout.plantilla')

@section('tituloPagina', 'Crud Laravel 8')

@section('contenido') 
<div class="card">
    <div class="card-header">Crud con Laravel 8</div>
    <div class="card-body">
        <div class="row"> 
            <div class="col-sm-12">
                @if($mensaje = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
                @endif
            </div>
        </div>

        <h5 class="card-title">Listado de personas en el sistema</h5>
        <p>
            <a href="{{ route('personas.create') }}" class="btn btn-primary">Agregar una nueva persona</a>
        </p>
        <a href="{{ route('descargarPdfAll') }}" class="btn btn-success btn-sm m-1">
            <i class="fas fa-file-pdf"></i> Generar PDF
        </a>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th> <!-- Agregar columna de 'Foto' -->
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Nombres</th>
                        <th>Fecha de nacimiento</th>
                        <th>Rol</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/fotos/' . $item->foto) }}" alt="Foto de {{ $item->nombre }}" class="img-thumbnail" style="width: 100px;">
                        </td>
                        <td>{{ $item->paterno }}</td>
                        <td>{{ $item->materno }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->fecha_nacimiento }}</td>
                        <td>{{ $item->roles->name }}</td>
                        <td>
                            <a href="{{ route('personas.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-user-edit"></i> Editar
                            </a>
                        </td>
                        <td>    
                            <a href="{{ route('personas.show', $item) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </a>
                        </td>
                        <td>    
                            <a href="{{ route('descargarPDFId', $item) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-file-pdf"></i> Imprimir
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
