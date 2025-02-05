<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepositAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'quote_id',
        'client_name',
        'quote_folio',
        'total_cost',
        'initial_deposit',
        'payment_deadline',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function remainingBalance()
    {
        //Calculo inicial con del deposito inicial
        $remainingBalance = $this->total_cost - $this->initial_deposit;

        //Sumar todos los depositos adicionales realizados
        $totalDeposits = $this->deposits()->sum('amount');

        //Calcular el saldo restante
        $remainingBalance -= $totalDeposits;

        return max($remainingBalance, 0); //El saldo nunca debe de ser negativo‹
    }
}
