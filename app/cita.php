<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cita extends Model
{
    protected $table = "cita";
    protected $primaryKey = 'id';

    // estado 1 (cita reservada), 0 (anullda), 2(atendida) 
    protected $fillable = ['id','fecha_citada', 'hora_citada', 'fecha_atendida', 'id_cliente', 'id_doctor', 'motivo',
        'id_seguro', 'id_enfermedad', 'alergias', 'receta', 'valor_cobro', 'valor_descuento_seguro', 'total_pagar', 'estado'];

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
}
