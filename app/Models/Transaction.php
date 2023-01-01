<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'code_transaction',
        'villa_id',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
