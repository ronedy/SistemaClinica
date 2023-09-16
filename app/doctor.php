<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    protected $table = "doctor";
    protected $primaryKey = 'id';

    protected $fillable = ['id','nombre','apellido','direccion','telefono','correo','fecha_nacimiento','id_usuario','estado'];
}
