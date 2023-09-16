<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\enfermedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades =     enfermedad::where('estado', 1)->get();
        return view('enfermedad.index', compact('enfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('enfermedad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required|max:100',
            'sintoma' => 'required|max:100',
            'receta' => 'required|max:100',
            'id_usuario' => 'required',
        ], [
                'id_usuario.required' =>'No se valido usuario, intente de nuevo, o cierre sesión.'
        ]);

        enfermedad::create($request->all());
        
        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado la enfermedad " . $request['descripcion'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('enfermedad.index')->with('mensaje', 'Una nueva enfermedad ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show(enfermedad $enfermedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit(enfermedad $enfermedad)
    {
            return view('enfermedad.edit', 
            compact('enfermedad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, enfermedad $enfermedad)
    {
        $this->validate($request, [
            'descripcion' => 'required|max:100',
            'sintoma' => 'required|max:100',
            'receta' => 'required|max:100',
            'id_usuario' => 'required',
        ], [
                'id_usuario.required' =>'No se valido usuario, intente de nuevo, o cierre sesión.'
        ]);

        $enfermedad->update($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha actualizado la enfermedad " . $enfermedad->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('enfermedad.index')->with('mensaje', 'Se ha modificado la enfermedad.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(enfermedad $enfermedad)
    {
        $enfermedad->estado = 0;
        $enfermedad->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado la enfermedad " . $enfermedad->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('enfermedad.index')->with('mensaje', 'La enfermedad se ha eliminado.');
    }
}
