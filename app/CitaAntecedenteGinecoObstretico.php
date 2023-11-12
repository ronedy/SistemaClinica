<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaAntecedenteGinecoObstretico extends Model
{
    protected $table = "cita_ant_gineco_obstretico";
    protected $primaryKey = 'id';

    protected $fillable = [
        'g',
        'p',
        'ab',
        'c',
        'hv',
        'hm',
        'menarquia',
        'ciclos',
        'fur',
        'fpp',
        'pap',
        'ets',
        'coitarquia',
        'grupo_rh',
        'no_parejas',
        'observacion',
        'estado' // 0 = eliminado, 1 = activo
    ];
}
