<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ganancias extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ganaciaTotal',
        
    ];
}
