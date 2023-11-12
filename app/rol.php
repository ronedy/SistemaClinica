<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table = "rol";
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion',
        'estado',
    ];
}
