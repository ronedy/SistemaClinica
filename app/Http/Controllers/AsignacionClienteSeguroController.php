<?php

namespace App\Http\Controllers;

use App\asignacion_cliente_seguro;
use App\bitacora;
use App\cliente;
use App\seguro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Throwable;

class AsignacionClienteSeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // solo vamos a llamar a todas las asignaciones con estado 1
        $asignaciones = asignacion_cliente_seguro::where('estado', 1)->get();
            return view('asignacion.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // obtenemos todos los clientes y seguros por separados
        $clientes = cliente::where('estado', 1)->pluck('dpi', 'id'); // pluck solo obtiene el dpi e id , asi hace mas facil seleccionar el registro en un seelct
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id'); // igual que cliente

        return view('asignacion.create', compact('clientes', 'seguros'));
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
            'id_cliente' => 'required|numeric',
            'id_seguro' => 'required|numeric',
            'valor_descuento' => 'required'
        ], [
            'id_cliente.required' => 'Debe indicar el cliente',
            'id_seguro.required' => 'Debe indicar el seguro',
            'valro_descuento.required' => 'Debe indicar el valor de descuento',
        ]);

         try{
                // buscamos en la bd si ya esta el cliente con el seguro, en estado activo
            $validar = asignacion_cliente_seguro::where('id_cliente', $request['id_cliente'])->where('id_seguro', $request['id_seguro'])->where('estado', 1)->count();

            // si encuenra mas de una parecidos, es porque ya existe la asignacion
            if ( $validar > 0 ){
                return redirect()->route('asignacionSeguro.create')->withInput()->with('mensaje', 'Ya esta la asociado la relacion');
            }else{
                asignacion_cliente_seguro::create($request->all());

                $bitacora = new bitacora();
                $bitacora->fecha = now();
                $bitacora->descripcion = "Se ha asignado el seguro " . $request['id_seguro'] . ' al cliente ' . $request['id_cliente'];
                $bitacora->estado = 1;
                $bitacora->username = Auth::user()->name;
                $bitacora->save();

                return redirect()->route('asignacionSeguro.index')->with('mensaje', 'Asignacion del seguro completado.');
            }
         }catch(Exception $e){
             throw $e;
         }catch(Throwable $e){
            throw $e;
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asignacion_cliente_seguro  $asignacion_cliente_seguro
     * @return \Illuminate\Http\Response
     */
    public function show(asignacion_cliente_seguro $asignacion_cliente_seguro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignacion_cliente_seguro  $asignacion_cliente_seguro
     * @return \Illuminate\Http\Response
     */
    public function edit(asignacion_cliente_seguro $asignacionSeguro)
    {
        $clientes = cliente::where('estado', 1)->pluck('dpi', 'id'); // pluck solo obtiene el dpi e id , asi hace mas facil seleccionar el registro en un seelct
        $seguros = seguro::where('estado', 1)->pluck('descripcion', 'id'); // igual que cliente
        // obtenemos todos los clientes y seguros por separados
        
        //return response()->json($asignacionSeguro);
        return view('asignacion.edit', compact('clientes', 'seguros', 'asignacionSeguro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignacion_cliente_seguro  $asignacion_cliente_seguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignacion_cliente_seguro $asignacionSeguro)
    {
        $this->validate($request, [
            'id_cliente' => 'required|numeric',
            'id_seguro' => 'required|numeric',
            'valor_descuento' => 'required'
        ], [
            'id_cliente.required' => 'Debe indicar el cliente',
            'id_seguro.required' => 'Debe indicar el seguro',
            'valro_descuento.required' => 'Debe indicar el valor de descuento',
        ]);

         try{
                 // buscamos en la bd si ya esta el cliente con el seguro, en estado activo
            $validar = asignacion_cliente_seguro::where('id_cliente', $request['id_cliente'])->where('id_seguro', $request['id_seguro'])->where('estado', 1)->where('id', '!=', $asignacionSeguro->id)->count();

            // si encuenra mas de una parecidos, es porque ya existe la asignacion
            if ( $validar > 0 ){
                return redirect()->route('asignacionSeguro.create')->withInput()->with('mensaje', 'Ya esta la asociado la relacion');
            }else{
                $asignacionSeguro->update($request->all());

                $bitacora = new bitacora();
                $bitacora->fecha = now();
                $bitacora->descripcion = "Se ha actualizado la asignacion " . $asignacionSeguro->id;
                $bitacora->estado = 1;
                $bitacora->username = Auth::user()->name;
                $bitacora->save();

                return redirect()->route('asignacionSeguro.index')->with('mensaje', 'Asignacion del seguro modificado completado.');
            }
         }catch(Exception $e){
             throw $e;
         }catch(Throwable $e){
            throw $e;
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignacion_cliente_seguro  $asignacion_cliente_seguro
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignacion_cliente_seguro $asignacionSeguro)
    {
        $asignacionSeguro->estado = 0;
        $asignacionSeguro->update();

        $bitacora = new bitacora();
            $bitacora->fecha = now();
            $bitacora->descripcion = "Se ha eliminado la asignacion " . $asignacionSeguro->id;
            $bitacora->estado = 1;
            $bitacora->username = Auth::user()->name;
            $bitacora->save();

        return redirect()->route('asignacionSeguro.index')->with('mensaje', 'La asignación no se pudo eliminar.');
    }
}
