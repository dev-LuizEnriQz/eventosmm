<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
      'deposit_account_id',
      'user_id',
      'amount',
      'deposit_date',
      'payment_method',
      'deposit_type',
    ];

    public function depositAccount()
    {
        return $this->belongsTo(DepositAccount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
