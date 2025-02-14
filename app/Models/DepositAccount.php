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
        'payment_deadline',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'deposit_account_id');
    }

    public function remainingBalance()
    {
        //Obtener la suma de los depositos realizados
        $totalDeposits = $this->deposits()->sum('amount');

        return max($this->total_cost - $totalDeposits, 0); //El saldo nunca debe de ser negativo‹
    }
}
