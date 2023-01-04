<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'contract_id',
        'code_transaction',
        'price',
        'total_price',
        'payment_status',
        'status',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function villa(){
        return $this->belongsTo(User::class);
    }
}
