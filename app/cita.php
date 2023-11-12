<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    protected $table = "cita";
    protected $primaryKey = 'id';

    // estado 1 (cita reservada), 0 (anullda), 2(atendida)
    protected $fillable = [
        'fecha_citada',
        'hora_citada',
        'fecha_atendida',
        'id_cliente',
        'id_doctor',
        'motivo',
        'id_seguro',
        'id_enfermedad',
        'alergias',
        'receta',
        'observacion',
        'valor_cobro',
        'valor_descuento_seguro',
        'total_pagar',
        'estado',
        'id_cita_antecedente',
        'id_cita_ant_gin_obs',
    ];

    public function cliente()
    {
        return $this->hasOne('App\cliente', 'id', 'id_cliente');
    }

    public function doctor()
    {
        return $this->hasOne('App\doctor', 'id', 'id_doctor');
    }

    public function seguro()
    {
        return $this->hasOne('App\seguro', 'id', 'id_seguro');
    }

    public function enfermedad()
    {
        return $this->hasOne('App\enfermedad', 'id', 'id_enfermedad');
    }

    public function citaAntecedente()
    {
        return $this->hasOne(CitaAntecedente::class, 'id', 'id_cita_antecedente');
    }

    public function citaAntecedenteGineicoObstretico()
    {
        return $this->hasOne(CitaAntecedenteGinecoObstretico::class, 'id', 'id_cita_ant_gin_obs');
    }

    public function citaControlParental()
    {
        return $this->hasOne(CitaControlParental::class, 'id_cita', 'id');
    }
}
