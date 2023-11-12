<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'dpi',
        'alfabeta',
        'estado',
        'estado_civil',
        'genero',
    ];

    public function getEdadActualAttribute()
    {
        if ( empty($this->fecha_nacimiento) ){
            return "";
        }

        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->fecha_nacimiento);
        $hoy = now(); // Obtiene la fecha actual

        $anos = $hoy->diffInYears($fechaNacimiento);

        // Restar 1 si la fecha de nacimiento ya pasó este año
        if ($hoy->month < $fechaNacimiento->month || ($hoy->month == $fechaNacimiento->month && $hoy->day < $fechaNacimiento->day)) {
            $anos--;
        }

        return $anos;
    }

    public function citas()
    {
        return $this->hasMany('App\cita', 'id_cliente', 'id');
    }

    public function obtenerNombreCompletado()
    {
        return $this->nombre . ' ' . $this->apellido;
    }
}
