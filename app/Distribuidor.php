<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $fillable = ["nombre", "telefono", "direccion","ciudad"];
}
