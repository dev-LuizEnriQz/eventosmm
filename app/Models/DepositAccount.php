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
      'total_cost',
      'initial_deposit',
      'payment_due_date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
}
