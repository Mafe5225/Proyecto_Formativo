<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipo',
        'gesVentas',
        'fecha'
    ];
}
