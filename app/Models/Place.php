<?php

namespace App\Models;

use App\Models\Ride;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name_p',
        'address_p',
        'latitude_p',
        'longitude_p',
    ];

    public function rides(){
        return $this->hasMany(Ride::class);
    }

    public function stops(){
        return $this->belongsToMany(Ride::class);
    }
}
