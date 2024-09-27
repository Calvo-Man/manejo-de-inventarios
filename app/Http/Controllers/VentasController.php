<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Personas;
use App\Models\Ventas;
use App\Models\Productos;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Ventas::with(['productos'])->paginate(8);
        return view('ventas.ventasIndex', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventarios = Inventario::with(['productos'])->get();
        $clientes = Personas::all();
        return view('ventas.agregarVenta',compact('inventarios','clientes'));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cantidad' => 'required|numeric',
            'persona_id' => 'required',
        ]);


        $producto = Productos::find($request->input('producto_id'));
        $inventario = Inventario::where('producto_id', $producto->id)->first();

        if ($request->input('cantidad') > $inventario->cantidad_disponible) {
            return redirect()->back()->withErrors(['cantidad' => 'No hay suficiente cantidad en inventario para este producto.']);
        }

        $venta = new Ventas();
        $venta->producto_id = $request->input('producto_id');
        $venta->cantidad = $request->input('cantidad');
        // $venta->persona_id = $request->input('persona_id');
       
        $producto = Productos::find($venta->producto_id);
        $venta->precio_total = $producto->precio * $venta->cantidad;

        $venta->save(); 
        return redirect()->route('ventas.index')->with('success', 'Venta creada con éxito');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ventas $ventas)
    {
        //
    }
}
