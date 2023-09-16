<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    protected $table = "bitacora";
    protected $primaryKey = 'id';

    protected $fillable = ['id','fecha', 'descripcion', 'estado', 'username'];
}
