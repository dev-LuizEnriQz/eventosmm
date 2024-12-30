<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Event extends Model
{
    //Nombre de la tabla
    protected $table = 'events';

    protected $fillable = [
        'quote_id',
        'client_id',
        'event_type',
        'event_date',
        'status',
    ];

    //Relación con la Table de Clientes
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //Relación con la Tabla de Cotizaciones
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

}
