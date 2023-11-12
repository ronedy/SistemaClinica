<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaControlParental extends Model
{
    protected $table = "cita_control_parental";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_cita',
        'edad_gestacional',
        'presion_arterial',
        'altura_uterina',
        'presentacion',
        'fcf',
        'peso',
        'ultrasonido',
        'vacunas',
        'estado' // 0 = eliminado, 1 = activo
    ];
}
