<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
      'deposit_account_id', //ID de la cuenta de Deposito
      'amount',//Monto
      'deposit_type',// Tipo de Deposito: Inicial, Parcial , Final
      'payment_date',//Dia que se efectuo el deposito
      'payment_method',//Metodo de Pago: Efectivo , Transferencia
      'user_id',//Quien Registro el Deposito o Pago
    ];

    public function depositAccount()
    {
        return $this->belongsTo(DepositAccount::class, 'deposit_account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
