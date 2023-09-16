<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seguro extends Model
{
    protected $table = "seguro";
    protected $primaryKey = 'id';

    protected $fillable = ['id','descripcion','estado'];
}
