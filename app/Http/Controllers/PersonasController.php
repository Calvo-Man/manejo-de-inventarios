<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class PersonasController extends Controller
{

    public function clientes()
    {
        $personas = Personas::with(['roles'])->get();
        return view('clientes',compact('personas'));
    }
    public function index()
    {
        $personas = Personas::paginate(3);
        return view('inicio', compact('personas'));
    }

    public function crearPdf()
    {
        $personas = Personas::all();
        
        $pdf = Pdf::loadView('pdfAll', compact('personas'));
            
        return $pdf->stream('pdfAll.pdf');
    }
    public function crearPDFId($id)
    {      
        $persona = Personas::findOrFail($id); 
       
        $pdf = Pdf::loadView('pdfId', compact('persona'))
        ->setOptions(['isRemoteEnabled' => true]);
          
       return $pdf->stream('persona_'.$persona->id.'.pdf');
        //return view('pdfId', compact('persona','fotoPath'));
    }
    public function verPdf()
    {
        $personas = Personas::with(['roles'])->get();
        return view('pdfAll', compact('personas'));
    }

    public function create()
    {
        return view("agregar");
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        $persona = new Personas();
        $persona->paterno = $request->input('paterno');
        $persona->materno = $request->input('materno');
        $persona->nombre = $request->input('nombre');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/fotos', $nombreFoto);
            $persona->foto = $nombreFoto;
        }

        $persona->save();
        return redirect()->route('personas.index')->with("success", "Persona agregada correctamente.");
    }

    public function show(Personas $persona)
    {
        return view('eliminar', compact('persona'));
    }

    public function edit($id)
    {
        $personas = Personas::findOrFail($id);
        return view('actualizar', compact('personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
        ]);

        $personas = Personas::findOrFail($id);
        $personas->paterno = $request->input('paterno');
        $personas->materno = $request->input('materno');
        $personas->nombre = $request->input('nombre');
        $personas->fecha_nacimiento = $request->input('fecha_nacimiento');

        if ($request->hasFile('foto')) {
            if ($personas->foto) {
                Storage::delete('public/fotos/' . $personas->foto);
            }

            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/fotos', $nombreFoto);
            $personas->foto = $nombreFoto;
        }

        $personas->save();
        return redirect()->route('personas.index')->with("success", "Persona actualizada correctamente.");
    }

    public function destroy(Personas $persona)
    {
        if ($persona->foto) {
            Storage::delete('public/fotos/' . $persona->foto);
        }
        $persona->delete();
        return redirect()->route('personas.index')->with("success", "Persona eliminada correctamente.");
    }
}
