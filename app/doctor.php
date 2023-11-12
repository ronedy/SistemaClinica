<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = "doctor";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_especialidad',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
        'fecha_nacimiento',
        'id_usuario',
        'estado'
    ];

    public function especialidad()
    {
        return $this->hasOne(especialidad::class, 'id', 'id_especialidad');
    }
}
