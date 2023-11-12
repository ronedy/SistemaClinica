<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaAntecedente extends Model
{
    protected $table = "cita_antecedente";
    protected $primaryKey = 'id';

    protected $fillable = [
        'medicos',
        'quirurgicos',
        'alergicos',
        'traumaticos',
        'familiares',
        'observacion',
        'estado' // 0 = eliminado, 1 = activo
    ];
}
