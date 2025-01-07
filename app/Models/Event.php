<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Event extends Model
{
    //Nombre de la tabla
    protected $table = 'events';

    protected $fillable = [
        'folio',
        'client_id',
        'quote_id',
        'event_type',
        'event_date',
        'status',
        'guests',
        'package_type',
        'description',
    ];

    //Relación con la Table de Clientes
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    //Relación con la Tabla de Cotizaciones
    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }

}
