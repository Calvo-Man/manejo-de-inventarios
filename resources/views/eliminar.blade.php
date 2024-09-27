@extends('layout.plantilla')

@section('tituloPagina', 'Eliminar Registro')

@section('contenido')

<div class="card">
    <h5 class="card-header">Eliminar a una persona...</h5>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estás a punto de eliminar a la siguiente persona:
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $persona->paterno }}</td>
                            <td>{{ $persona->materno }}</td>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->fecha_nacimiento }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Regresar</a>
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </p>
    </div>
</div>

@endsection
