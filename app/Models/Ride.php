<?php

namespace App\Models;

use App\Models\Car;
use App\Models\User;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ride extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date_t',
        'hour_t',
        'passengers_t',
        'places_id',
        'destiny_id',
        'cars_id',
    ];

    public function placesB(){
        return $this->belongsTo(Place::class, 'places_id');
    }

    public function placesF(){
        return $this->belongsTo(Place::class, 'destiny_id');
    }

    public function cars(){
        return $this->belongsTo(Car::class);
    }

    public function stops(){
        return $this->belongsToMany(Place::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

