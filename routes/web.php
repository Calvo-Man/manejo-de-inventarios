<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EntradaDeProductosController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/clientes', [PersonasController::class, 'clientes'])->name('clientes');


Route::get('/pdf',[PersonasController::class, 'crearPdf'])->name('descargarPdfAll');
Route::get('/ver-pdf',[PersonasController::class, 'verPdf'])->name('verPdf');

Route::get('/pdf-id/{id}',[PersonasController::class, 'crearPDFId'])->name('descargarPDFId');


//routes for personas
Route::get('/personas', [PersonasController::class, 'index'])->name('personas.index');
Route::get('/personas/create', [PersonasController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonasController::class, 'store'])->name('personas.store');
Route::get('/personas/{id}/edit', [PersonasController::class, 'edit'])->name('personas.edit');
Route::put('/personas/{id}', [PersonasController::class, 'update'])->name('personas.update');
Route::delete('/personas/{persona}', [PersonasController::class, 'destroy'])->name('personas.destroy');
Route::get('/personas/{persona}/show', [PersonasController::class, 'show'])->name('personas.show');

//routes for categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');


//routes for productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');

//inventario
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventarios.index');

//routes for entrada_de_productos
Route::get('/entrada-productos', [EntradaDeProductosController::class, 'index'])
->name('entrada_de_productos.index');

Route::get('/entrada-productos/create', [EntradaDeProductosController::class, 'create'])->
name('entrada_de_productos.create');
Route::post('/entrada-productos', [EntradaDeProductosController::class, 'store'])->
name('entrada_de_productos.store');

//Ventas
Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentasController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');
