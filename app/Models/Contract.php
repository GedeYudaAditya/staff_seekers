<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'staff_id',
        'villa_id',
        'start_date',
        'end_date',
        'total_price',
        'signatures_staff',
        'signatures_villa',
        'payment_status',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function villa()
    {
        return $this->belongsTo(User::class, 'villa_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
