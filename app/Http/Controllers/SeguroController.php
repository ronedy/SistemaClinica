<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\seguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguros = seguro::where('estado', 1)
            ->orderBy('descripcion', 'ASC')
            ->paginate(10);

        return view('seguro.index', compact('seguros') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // esto indica que en la carpeta seguro hay un archivo create
        return view('seguro.create');
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

        seguro::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado el seguro " . $request['descripcion'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('seguro.index')->with('mensaje', 'Un seguro ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\seguro  $seguro
     * @return \Illuminate\Http\Response
     */
    public function show(seguro $seguro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\seguro  $seguro
     * @return \Illuminate\Http\Response
     */
    public function edit(seguro $seguro)
    {
        // aca pasa la variable seguro a la vista
            return view('seguro.edit', compact('seguro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\seguro  $seguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, seguro $seguro)
    {
        $this->validate($request, [
            'descripcion' => 'required|max:100',
        ]);

        $seguro->update($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha actualizado el seguro " . $seguro->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        
        return redirect()->route('seguro.index')->with('mensaje', 'Un seguro ha sido modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\seguro  $seguro
     * @return \Illuminate\Http\Response
     */
    public function destroy(seguro $seguro)
    {
        $seguro->estado = 0;
        $seguro->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado al seguro " . $seguro->descripcion;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('seguro.index')->with('mensaje', 'El seguro se ha eliminado.');
    }
}
