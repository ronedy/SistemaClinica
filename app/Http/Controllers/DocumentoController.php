<?php

namespace App\Http\Controllers;

use App\cita;
use App\cliente;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class DocumentoController extends Controller
{
    public function exportPDFCitaFicha()
    {
        try{
            $idCita = json_decode(request('idCita'), true);

            $cita = cita::find($idCita);
            if( !$cita ){
                throw new Exception('No se pudo encontrar la cita ' . $idCita);
            }

            $data = [
                'cita' => $cita,
                'paciente' => $cita->cliente,
            ];

            $pdf = Pdf::loadView('pdf.ficha_cita', $data);

            return $pdf->download('cita.pdf');
        }catch(Exception|Throwable $e){
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function exportPDFRecetaCita()
    {
        try{
            $idCita = json_decode(request('idCita'), true);

            $cita = cita::find($idCita);
            if( !$cita ){
                throw new Exception('No se pudo encontrar la cita ' . $idCita);
            }

            $data = [
                'cita' => $cita,
                'paciente' => $cita->cliente,
                'antecedente' => $cita->citaAntecedente,
                'antecedenteGineco' => $cita->citaAntecedenteGineicoObstretico,
                'controlParental' => $cita->citaControlParental,
            ];

            $pdf = Pdf::loadView('pdf.receta_cita', $data);

            return $pdf->download('recepta.pdf');
        }catch(Exception|Throwable $e){
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function exportPDFExpedienteCliente()
    {
        try{
            $idCliente = json_decode(request('idCliente'), true);

            $cliente = cliente::find($idCliente);
            if( !$cliente ){
                throw new Exception('No se pudo encontrar al paciente ' . $idCliente);
            }

            $citas = cita::query()
                ->where('estado', '=', 2 ) // atendida
                ->with([
                    'citaAntecedente',
                    'citaAntecedenteGineicoObstretico',
                    'citaControlParental'
                ])
                ->orderBy('fecha_atendida', 'DESC')
                ->get();

            $data = [
                'paciente' => $cliente,
                'citas' => $citas
            ];

            $pdf = Pdf::loadView('pdf.expediente_paciente', $data);

            return $pdf->download('recepta.pdf');
        }catch(Exception|Throwable $e){
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
