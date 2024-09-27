<?php

namespace App\Http\Controllers;

use App\Models\EntradaDeProductos;
use App\Models\Productos;
use Illuminate\Http\Request;

class EntradaDeProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entradas = EntradaDeProductos::with(['productos'])->paginate(5);
        
        return view('entrada_de_productos.entradaIndex', compact('entradas'));
    
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Productos::all();
        
        return view('entrada_de_productos.agregarEntrada',compact('productos'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cantidad' => 'required|numeric', 
        ]);
        $entrada = new EntradaDeProductos();
        $entrada->producto_id = $request->input('producto_id');
        $entrada->cantidad = $request->input('cantidad');

        $producto = Productos::find($entrada->producto_id);
        $entrada->precio_total = $producto->precio * $entrada->cantidad;

        $entrada->save();
        return redirect()->route('entrada_de_productos.index')->with('success', 'Entrada de producto');



        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EntradaDeProductos $entradaDeProductos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntradaDeProductos $entradaDeProductos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EntradaDeProductos $entradaDeProductos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntradaDeProductos $entradaDeProductos)
    {
        //
    }
}
