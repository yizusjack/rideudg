<?php

namespace App\Models;

use App\Models\User;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'marcas_id',
        'model_c',
        'colors_id',
        'placas_c',
        'users_id',
    ];

    public function marcas(){
        return $this->belongsTo(Marca::class);
    }

    public function colors(){
        return $this->belongsTo(Color::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function rides(){
        return $this->hasMany(Ride::class);
    }
}
