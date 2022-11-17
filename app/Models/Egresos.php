<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Egresos extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'gesEgresos',
        'fecha',
        'tipo'
    ];
}
