<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey = 'id';

    protected $fillable = ['id','nombre','apellido','direccion','telefono','correo','fecha_nacimiento','dpi','estado'];

    public function citas()
    {
        return $this->hasMany('App\cita', 'id_cliente', 'id');
    }
}
