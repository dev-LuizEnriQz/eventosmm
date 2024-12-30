<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    //Nombre de la Tabla
    protected $table = 'clients';

    //Permitir asignacion masiva de los siguientes campos
    protected $fillable = [
        'first_name',
        'last_name',
        'second_surname',
        'phone',
        'email',
        'company',

        'activo',
        'created_by'
    ];

    //Metodo para filtrar clientes activos
    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }
    //Relación con la tabla User
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Accessor para el nombre completo
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name} {$this->second_surname}";
    }

    //Ralacion con la Tabla Cotizacion
    public function quote()
    {
        return $this->hasMany(Quote::class);
    }

    //Relación con la Tabla Evento
    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
