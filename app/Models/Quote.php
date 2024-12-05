<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    //Nombre de la Tabla
    protected $table = 'quotes';

    //Permitir asignacion masiva de los siguientes campos
    protected $fillable = [
        'client_id',
        'folio',
        'client_name',
        'event_name',
        'description',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($quote) {
           $latestFolio = self::lates('id')->value('folio') ?? 'A1000';//Ultimo folio o valor inicial
           $nextNumber = (int) substr($latestFolio, 1) + 1;//Incrementar número
            $quote->folio = 'A' . $nextNumber;//Asignar nuevo Folio concatenado
        });
    }
}
