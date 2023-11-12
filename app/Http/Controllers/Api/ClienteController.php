<?php

namespace App\Http\Controllers\Api;

use App\cita;
use Exception;
use Illuminate\Routing\Controller;
use Throwable;

class ClienteController extends Controller
{
    public function historialControlParental($id)
    {
        try{
            $citas = cita::query()
                ->where('estado', '=', 2)
                ->whereHas('citaControlParental', function($query){
                    $query->whereNotNull('edad_gestacional')
                        ->orWhereNotNull('presion_arterial')
                        ->orWhereNotNull('altura_uterina')
                        ->orWhereNotNull('presentacion')
                        ->orWhereNotNull('fcf')
                        ->orWhereNotNull('peso')
                        ->orWhereNotNull('ultrasonido')
                        ->orWhereNotNull('vacunas');
                })
                ->with([
                    'citaControlParental'
                ])
                ->orderBy('fecha_atendida', 'DESC')
                ->get();

            $results = array();

            foreach($citas as $cita){
                $citaControlParental = $cita->citaControlParental;

                $results[] = array(
                    'id_cita' => $cita->id,
                    'fecha_atendida' => date('d/m/Y H:i:s', strtotime($cita->fecha_atendida)),
                    'edad_gestacional' => $citaControlParental->edad_gestacional,
                    'presion_arterial' => $citaControlParental->presion_arterial,
                    'altura_uterina' => $citaControlParental->altura_uterina,
                    'presentacion' => $citaControlParental->presentacion,
                    'fcf' => $citaControlParental->fcf,
                    'peso' => $citaControlParental->peso,
                    'ultrasonido' => $citaControlParental->ultrasonido,
                    'vacunas' => $citaControlParental->vacunas,
                );
            }

            return response()->json($results, 200);
        }catch(Exception|Throwable $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
