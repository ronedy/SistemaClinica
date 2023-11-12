<?php

namespace App\Http\Controllers;

use App\cliente;
use App\especialidad;
use Illuminate\Support\Facades\DB;

class AutoCompleteController extends Controller
{
    public function especialidades()
    {
        $filtro = request('filtro', '');

        return response()->json(
            especialidad::query()->where('estado', 1)
                ->where('descripcion', 'LIKE', '%' . $filtro . '%')
                ->take(10)
                ->get()
        );
    }

    public function pacientes()
    {
        $filtro = request('filtro', '');

        // fecha_nacimiento

        return response()->json(
            cliente::query()->where('estado', 1)
                ->where(DB::raw('CONCAT_WS(" ", nombre, apellido)'), 'LIKE', '%' . $filtro . '%')
                ->select(
                    '*',
                    DB::raw('YEAR(CURDATE()) - YEAR(fecha_nacimiento) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), "-", MONTH(fecha_nacimiento), "-", DAY(fecha_nacimiento)), "%Y-%m-%d") > CURDATE(), 1, 0) as edad'))
                ->take(10)
                ->get()
        );
    }
}
