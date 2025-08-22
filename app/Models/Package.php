<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    //Relación con Cotizaciones
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
