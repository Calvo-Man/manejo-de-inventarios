@extends('layout.plantilla')

@section('tituloPagina', 'Crud Laravel 8')

@section('contenido') 
<link rel="stylesheet" href="assets/style.css">
<div class="container">
    <img src="assets/Russo.png" height="200">

</div>

<nav class="nav">
    <ul class="list">

        <li class="list__item">
            <div class="list__button">
                <img src="assets/dashboard.svg" class="list__img">
                <a href="#" class="nav__link">Inicio</a>
            </div>
        </li>

        <li class="list__item list__item--click">
            <div class="list__button list__button--click">
                <img src="assets/docs.svg" class="list__img">
                <a href="#" class="nav__link">Productos</a>
                <img src="assets/arrow.svg" class="list__arrow">
            </div>

            <ul class="list__show">
                <li class="list__inside">
                    <a href="{{ route('categorias.index') }}" class="nav__link nav__link--inside">Categorias</a>
                    
                </li>

                <li class="list__inside">
                    <a href="{{route('productos.index')}}" class="nav__link nav__link--inside">Producto</a>
                </li>
                <li class="list__inside">
                    <a href="{{route('inventarios.index')}}" class="nav__link nav__link--inside">Inventario</a>
                </li>
            </ul>

        </li>


        <li class="list__item">
            <div class="list__button">
                <img src="assets/stats.svg" class="list__img">
                <a href="#" class="nav__link">Servicios</a>
            </div>
        </li>

        <li class="list__item list__item--click">
            <div class="list__button list__button--click">
                <img src="assets/bell.svg" class="list__img">
                <a href="#" class="nav__link">Pedidos</a>
                <img src="assets/arrow.svg" class="list__arrow">
            </div>

            <ul class="list__show">
                <li class="list__inside">
                    <a href="{{route('entrada_de_productos.index')}}" class="nav__link nav__link--inside">Registros de entrada</a>
                </li>

                <li class="list__inside">
                    <a href="{{route('ventas.index')}}" class="nav__link nav__link--inside">Ventas</a>
                </li>
            </ul>

        </li>

        <li class="list__item">
            <div class="list__button">
                <img src="assets/message.svg" class="list__img">
                <a href="{{route('clientes')}}" class="nav__link">Clientes</a>
            </div>
        </li>

        <li class="list__item">
            <div class="list__button">
                <img src="assets/message.svg" class="list__img">
                <a href="#" class="nav__link">Contacto</a>
            </div>
        </li>

    </ul>
</nav>
<script src="assets/main.js"></script>
@endsection
