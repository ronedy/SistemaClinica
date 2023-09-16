<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignacion_cliente_seguro extends Model
{
    protected $table = "asignacion_cliente_seguro";
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'id_cliente', 'id_seguro', 'valor_descuento', 'estado'];

    public function cliente()   { 
            return $this-> 
                hasOne('App\cliente', 'id', 'id_cliente');
    }

    public function seguro()   { 
            return $this-> 
                hasOne('App\seguro', 'id', 'id_seguro');
    }
}
