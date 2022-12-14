<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'slug',
        'contract_id',
        'code_transaction',
        'price',
        'total_price',
        'payment_status',
        'status',
        'bukti_pembayaran',
    ];

    public function contract()
    {
        // define one to one relationship to Contract model
        return $this->belongsTo(Contract::class);
    }
    public function villa()
    {
        return $this->belongsTo(User::class);
    }
}
