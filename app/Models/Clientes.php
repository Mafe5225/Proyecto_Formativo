<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nombre',
        'cedula',
        'telefono',
        'direccion'
    ];
}
