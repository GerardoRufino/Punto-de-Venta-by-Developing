<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function productos()
    {
        return $this->hasMany("App\Producto", "codigo_barras");
    }

    public function cliente()
    {
        return $this->belongsTo("App\Cliente", "id_cliente");
    }
}
