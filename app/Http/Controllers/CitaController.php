<?php

namespace App\Http\Controllers;

use App\bitacora;
use App\cita;
use App\CitaAntecedente;
use App\CitaAntecedenteGinecoObstretico;
use App\CitaControlParental;
use App\cliente;
use App\doctor;
use App\enfermedad;
use App\seguro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

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

        $citasQuery = cita::where('estado', '!=', 0);

        if ($request['fecha_inicio'] != "" && $request['fecha_fin'] != "") {
            $citasQuery->where('fecha_citada', '>=', $fecha_inicio)
                ->where('fecha_citada', '<=', $fecha_fin);
        }else if ($request['fecha_inicio'] != "" && $request['fecha_fin'] == "") {
            $citasQuery->where('fecha_citada', '>=', $fecha_inicio);
        }else if ($request['fecha_inicio'] == "" && $request['fecha_fin'] != "") {
            $citasQuery->where('fecha_citada', '<=', $fecha_fin);
        }

        $citas = $citasQuery->orderBy('id', 'DESC')->paginate(10);
        
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
            'observacion' => 'required|max:100',
        ], [
            'id_cliente.required' =>'Debe indicar el paciente.',
            'id_doctor.required' =>'Debe indicar el médico.',
        ]);

        cita::create($request->all());

        $bitacora = new bitacora();
        $bitacora->fecha = now();
        $bitacora->descripcion = "Se ha registrado una reservaión de cita.";
        $bitacora->estado = 1;
        $bitacora->username = auth()->user()->name;
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
        $clientes = cliente::where('estado', 1)->get();
        $doctores = doctor::where('estado', 1)->get();
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id');
        $enfermedades = enfermedad::where('estado', 1)->pluck('descripcion', 'id');

        return view('cita.show', compact('clientes', 'doctores', 'seguros', 'enfermedades', 'cita'));
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
            'observacion' => 'required|max:100',
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
        $bitacora->username = auth()->user()->name;
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
        if ( $cita->estado == 2  && auth()->user()->id_rol == 2 ){
            return redirect()->route('cita.index')->withErrors('No puedes eliminar la cita ya que fue atendida.');
        }

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

    public function guardarAtenderCita(Request $request, cita $cita)
    {
        $this->validate($request, [
            'fecha_citada' => 'required|date_format:Y-m-d',
            'hora_citada' => 'required',
            'id_cliente' => 'required',
            'id_doctor' => 'required',
            'motivo' => 'required|max:255',
            'receta' => 'required|max:255',
            'observacion' => 'required|max:255',
            // cita antecedente
            'antecedente_medico' => 'max:200',
            'antecedente_quirurgicos' => 'max:200',
            'antecedente_alergicos' => 'max:200',
            'antecedente_traumaticos' => 'max:200',
            'antecedente_familiares' => 'max:200',
            // cita antedente gineco obstretico
            'antecedente_go_g' => 'max:50',
            'antecedente_go_p' => 'max:50',
            'antecedente_go_ab' => 'max:50',
            'antecedente_go_c' => 'max:50',
            'antecedente_go_hv' => 'max:50',
            'antecedente_go_hm' => 'max:50',
            'antecedente_go_menarquia' => 'max:50',
            'antecedente_go_ciclos' => 'max:50',
            'antecedente_go_fur' => 'max:50',
            'antecedente_go_fpp' => 'max:50',
            'antecedente_go_pap' => 'max:50',
            'antecedente_go_ets' => 'max:50',
            'antecedente_go_coitarquia' => 'max:50',
            'antecedente_go_grupo_rh' => 'max:50',
            'antecedente_go_no_parejas' => 'nullable|numeric|gte:0',
            // registro control parental
            'cp_edad_gestacional' => 'nullable|max:50',
            'cp_presion_arterial' => 'nullable|max:50',
            'cp_altura_uterina' => 'nullable|max:50',
            'cp_presentacion' => 'nullable|max:50',
            'cp_fcf' => 'nullable|max:50',
            'cp_peso' => 'nullable|max:50',
            'cp_ultrasonido' => 'nullable|max:50',
            'cp_vacunas' => 'nullable|max:50',
        ], [
            'id_cliente.required' =>'Debe indicar el paciente.',
            'id_doctor.required' =>'Debe indicar el médico.',
        ]);

        DB::beginTransaction();

        trY{
            $cita->update($request->all());

            $citaAntecedente = $cita->citaAntecedente;

            if ( !$citaAntecedente ){
                $citaAntecedente = new CitaAntecedente();
                $citaAntecedente->estado = 1;
            }
            $citaAntecedente->fill([
                'medicos' => request('antecedente_medico'),
                'quirurgicos' => request('antecedente_medico'),
                'alergicos' => request('antecedente_alergicos'),
                'traumaticos' => request('antecedente_traumaticos'),
                'familiares' => request('antecedente_familiares'),
                'observacion' => null,
            ]);
            $citaAntecedente->save();

            $citaAntGinecoObstretico = $cita->citaAntecedenteGineicoObstretico;
            if ( !$citaAntGinecoObstretico ){
                $citaAntGinecoObstretico = new CitaAntecedenteGinecoObstretico();
                $citaAntGinecoObstretico->estado = 1;
            }

            $citaAntGinecoObstretico->fill([
                'g' => request('antecedente_go_g'),
                'p' => request('antecedente_go_p'),
                'ab' => request('antecedente_go_ab'),
                'c' => request('antecedente_go_c'),
                'hv' => request('antecedente_go_hv'),
                'hm' => request('antecedente_go_hm'),
                'menarquia' => request('antecedente_go_menarquia'),
                'ciclos' => request('antecedente_go_ciclos'),
                'fur' => request('antecedente_go_fur'),
                'fpp' => request('antecedente_go_fpp'),
                'pap' => request('antecedente_go_pap'),
                'ets' => request('antecedente_go_ets'),
                'coitarquia' => request('antecedente_go_coitarquia'),
                'grupo_rh' => request('antecedente_go_grupo_rh'),
                'no_parejas' => request('antecedente_go_no_parejas'),
                'observacion' => null,
            ]);
            $citaAntGinecoObstretico->save();

            $cita->id_cita_antecedente = $citaAntecedente->id;
            $cita->id_cita_ant_gin_obs = $citaAntGinecoObstretico->id;
            $cita->fecha_atendida = date('Y-m-d H:i:s');
            $cita->estado = 2; // atendida
            if ( !$cita->update() ){
                throw new Exception('No se pudo actualizar la cita.');
            }

            $citaControlParental = $cita->citaControlParental;
            if ( !$citaControlParental ){
                $citaControlParental = new CitaControlParental();
            }

            $citaControlParental->fill([
                'id_cita' => $cita->id,
                'edad_gestacional' => request('cp_edad_gestacional'),
                'presion_arterial' => request('cp_presion_arterial'),
                'altura_uterina' => request('cp_altura_uterina'),
                'presentacion' => request('cp_presentacion'),
                'fcf' => request('cp_fcf'),
                'peso' => request('cp_peso'),
                'ultrasonido' => request('cp_ultrasonido'),
                'vacunas' => request('cp_vacunas'),
                'estado' => 1
            ]);
            $citaControlParental->save();

            DB::commit();
            return redirect()->route('cita.index')->with('mensaje', 'Cita atendida correctamente.');
        }catch(Exception|Throwable $e){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
