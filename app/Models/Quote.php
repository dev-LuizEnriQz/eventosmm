<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    //Nombre de la Tabla
    protected $table = 'quotes';

    //Permitir asignacion masiva de los siguientes campos
    protected $fillable = [
        'client_id',
        'client_name',
        'client_company',
        'event_date',
        'guests',
        'event_type',
        'package_type',
        'description',
        'status',
        'folio',
    ];

    protected static function booted()
    {
        static::creating(function ($quote) {
           $latestFolio = self::latest('id')->value('folio') ?? 'A1000';//Ultimo folio o valor inicial
           $nextNumber = (int) substr($latestFolio, 1) + 1;//Incrementar número
            $quote->folio = 'A' . $nextNumber;//Asignar nuevo Folio concatenado
        });
    }

    //Relacion con la Tabla Cliente
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id','id');
    }

    //Relacion con la Tabla Evento
    public function event()
    {
        return $this->hasOne(Event::class);
    }

    protected $casts = [
      'event_date' => 'datetime',
    ];
}
