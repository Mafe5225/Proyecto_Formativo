<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimientos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'fecha',
        'valor',
        'tipoMovimiento',
        'cliente_id'
    ];
}