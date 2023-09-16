<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    protected $table = "especialidad";
    protected $primaryKey = 'id';

    protected $fillable = ['id','descripcion','estado'];
}
