<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enfermedad extends Model
{
    protected $table = "enfermedad";
    protected $primaryKey = 'id';

    protected $fillable = ['id','descripcion', 'sintoma', 'receta', 'id_usuario', 'estado'];

    public function usuario()
    {
        return $this->hasOne('App\User', 'id', 'id_usuario');
    }
}
