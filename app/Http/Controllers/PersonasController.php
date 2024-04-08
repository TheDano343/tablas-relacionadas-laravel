<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Carrera;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $VARIABLE = MODELO::all() : es equivalete select * from '',de SQL
        $personas = Personas::all();
        $carreras = Carrera::all();
        //Personas y carreras, se utilizan en los foreach del index
        return view('personas.index', compact('personas','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('personas.create');

        // Esto utiliza el modelo Carrera para acceder a la tabla correspondiente en la base de datos.
        $carreras = Carrera::all(); // Obtener todas las carreras
        // view() se utiliza para cargar la vista
        //  La función compact('carreras') se utiliza para pasar la variable $carreras a la vista. 
        // En la vista, podrás acceder a las carreras utilizando esta variable.
        return view('personas.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'carrera_id' => 'required'
        ]);

        Personas::create($request->all());
        return redirect()->route('personas.index')
        ->with('success','Registro realizado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $personas)
    {
        $carreras = Carrera::all();
        return view('personas.edit', compact('personas','carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personas $personas)
    {
      $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'carrera_id' => 'required'
        ]); 

      $personas->update($data);

      return redirect(route('personas.index'))->with('success', 'Persona actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personas $personas)
    {
        $personas->delete();
        return redirect(route('personas.index'))->with('success', 'Persona eliminada');
    }
}
