<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'marca_c',
        'model_c',
        'color_c',
        'placas_c',
        'users_id',
    ];
}
