<?php

namespace App\Http\Controllers;

use App\bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->id_rol == 2 ){
            return redirect()->route('home')->withErrors('No tienes permiso para acceder.');
        }

        $fechaInicio = request('fecha_inicio');
        $fechaFin = request('fecha_fin');

        $bitacorasQuery = bitacora::where('estado', 1);

        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $bitacorasQuery->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        } elseif (!empty($fechaInicio)) {
            $bitacorasQuery->where('fecha', '>=', $fechaInicio);
        } elseif (!empty($fechaFin)) {
            $bitacorasQuery->where('fecha', '<=', $fechaFin);
        }

        $bitacoras = $bitacorasQuery
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('bitacora.index', compact(
            'bitacoras',
            'fechaInicio',
            'fechaFin'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function show(bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function edit(bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(bitacora $bitacora)
    {
        //
    }
}
