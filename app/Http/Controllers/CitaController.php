<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\cita;
use App\cliente;
use App\doctor;
use App\enfermedad;
use App\seguro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fecha_inicio = $request['fecha_inicio'];
        $fecha_fin = $request['fecha_fin'];

        if ($request['fecha_inicio'] != "" && $request['fecha_fin'] != "") {
            $citas = cita::where('estado', '!=', 0)
                ->where('fecha_citada', '>=', $fecha_inicio)
                ->where('fecha_citada', '<=', $fecha_fin)
                ->get();
        }else if ($request['fecha_inicio'] != "" && $request['fecha_fin'] == "") {
            $citas = cita::where('estado', '!=', 0)->where('fecha_citada', '>=', $fecha_inicio)
                ->get();
        }else if ($request['fecha_inicio'] == "" && $request['fecha_fin'] != "") {
            $citas = cita::where('estado', '!=', 0)
                ->where('fecha_citada', '<=', $fecha_fin)
                ->get();
        }else{
            $citas = cita::where('estado', '!=', 0)->get();
        }
        
        return view('cita.index', compact('citas', 'fecha_inicio', 'fecha_fin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = cliente::where('estado', 1)->get();
        $doctores = doctor::where('estado', 1)->get();
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id');
        $enfermedades = enfermedad::where('estado', 1)->pluck('descripcion', 'id');

        // nos vamos a la vista con todos los datos buscados aca
        return view('cita.create', compact('clientes', 'doctores', 'seguros', 'enfermedades'));
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
            'fecha_citada' => 'required',
            'hora_citada' => 'required',
            'id_cliente' => 'required',
            'id_doctor' => 'required',
        ], [
            'id_cliente.required' =>'Debe indicar el paciente.',
            'id_doctor.required' =>'Debe indicar el médico.',
        ]);

        cita::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado una reservaión de cita.";
        $bitacora->estado = 1;
        $bitacora->username = $request['nombre_usuario'];
        $bitacora->save();
        
        return redirect()->route('cita.index')->with('mensaje', 'Se ha resevado una cita.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(cita $cita)
    {
        $clientes = cliente::where('estado', 1)->get();
        $doctores = doctor::where('estado', 1)->get();
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id');
        $enfermedades = enfermedad::where('estado', 1)->pluck('descripcion', 'id');

        return view('cita.edit', compact('clientes', 'doctores', 'seguros', 'enfermedades', 'cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cita $cita)
    {
        $this->validate($request, [
            'fecha_citada' => 'required',
            'hora_citada' => 'required',
            'id_cliente' => 'required',
            'id_doctor' => 'required',
        ], [
            'id_cliente.required' =>'Debe indicar el paciente.',
            'id_doctor.required' =>'Debe indicar el médico.',
        ]);

        if ( $request['total_pagar'] != "" ){
            $request['estado'] = 2;
            $request['fecha_atendida'] = now();
        }

        $cita->update($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        if ( $request['total_pagar'] != "" ){
            $bitacora->descripcion = "Se ha atendido la reservación " . $cita->id;$cita->id;
        }else{
            $bitacora->descripcion = "Se ha editado la reservación " . $cita->id;$cita->id;
        }
        
        $bitacora->estado = 1;
        $bitacora->username = $request['nombre_usuario'];
        $bitacora->save();
        
        return redirect()->route('cita.index')->with('mensaje', 'Se ha atendido una cita.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(cita $cita)
    {
        $cita->estado = 0;
        $cita->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha anulado la cita " . $cita->id;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('cita.index')->with('mensaje', 'Se ha anulado una cita.');
    }

    public function atenderCita(cita $cita){
        $clientes = cliente::where('estado', 1)->get();
        $doctores = doctor::where('estado', 1)->get();
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id');
        $enfermedades = enfermedad::where('estado', 1)->pluck('descripcion', 'id');

        return view('cita.atender', compact('clientes', 'doctores', 'seguros', 'enfermedades', 'cita'));
    }
}
