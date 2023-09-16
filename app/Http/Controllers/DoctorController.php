<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = doctor::where('estado', 1)->get(); // para clientes solo activos
        return view('doctor.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create'); // solo nos vamos a la vista de crear cliente
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // validamos todos los camppos
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'direccion' => 'required|max:100',
            'telefono' => 'required|max:100',
            'correo' => 'required|max:100',
            'fecha_nacimiento' => 'required'
        ]);

        doctor::create($request->all()); // se guardan los name de la vista a las columnas que se llamen igual

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado al medico " . $request['nombre'] . ' ' . $request['apellido'];
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('doctor.index')->with('mensaje', 'Un doctor ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(doctor $doctor)
    {
        return view('doctor.edit', compact('doctor')); // se pasa la variable doctor a la vista
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctor $doctor)
    {
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'direccion' => 'required|max:100',
            'telefono' => 'required|max:100',
            'correo' => 'required|max:100',
            'fecha_nacimiento' => 'required'
        ]);

        $doctor->update($request->all());


        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha actualizado al medico " . $doctor->nombre . ' ' . $doctor->apellido;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();
        
        return redirect()->route('doctor.index')->with('mensaje', 'Un doctor ha sido modificado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
        $doctor->estado = 0;
        $doctor->update();

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha eliminado al medico " . $doctor->nombre . ' ' . $doctor->apellido;
        $bitacora->estado = 1;
        $bitacora->username = Auth::user()->name;
        $bitacora->save();

        return redirect()->route('doctor.index')->with('mensaje', 'El doctor se ha eliminado.');
    }
}
