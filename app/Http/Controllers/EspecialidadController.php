<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = especialidad::where('estado', 1)->get(); // para clientes solo activos
        return view('especialidad.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidad.create');
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
        ]);

        especialidad::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado la especialidad " . $request['descripcion'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('especialidad.index')->with('mensaje', 'Agregada nueva especialidad.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit(especialidad $especialidad)
    {
        return view('especialidad.edit', compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, especialidad $especialidad)
    {
        $this->validate($request, [
            'descripcion' => 'required|max:100',
        ]);

        $especialidad->update($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha actualizado la especialidad " . $especialidad->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('especialidad.index')->with('mensaje', 'Especialidad actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(especialidad $especialidad)
    {
        $especialidad->estado = 0;
        $especialidad->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado la especialidad " . $especialidad->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('especialidad.index')->with('mensaje', 'Especialidad ha sido eliminada.');
    }
}
