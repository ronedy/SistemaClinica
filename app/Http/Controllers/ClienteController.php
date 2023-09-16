<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = cliente::where('estado', 1)->get(); // para clientes solo activos
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'direccion' => 'required|max:100',
            'telefono' => 'required|max:100',
            'correo' => 'required|max:100',
            'fecha_nacimiento' => 'required',
            'dpi' => 'required|max:255',
        ]);

        cliente::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado al paciente con DPI " . $request['dpi'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('cliente.index')->with('mensaje', 'Un cliente ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        $citas = $cliente->citas;

        return view('cliente.ficha_clinica', compact('cliente', 'citas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'direccion' => 'required|max:100',
            'telefono' => 'required|max:100',
            'correo' => 'required|max:100',
            'fecha_nacimiento' => 'required',
            'dpi' => 'required|max:255',
        ]);

        $cliente->update($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha ediado al paciente con DPI " . $cliente->dpi;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('cliente.index')->with('mensaje', 'Un cliente ha sido modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        $cliente->estado = 0;
        $cliente->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado al paciente con DPI " . $cliente->dpi;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('cliente.index')->with('mensaje', 'El cliente se ha eliminado.');
    }
}
