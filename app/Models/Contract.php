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
        'position',
        'status',
        'staff_id',
        'villa_id',
        'start_date',
        'end_date',
        'signatures_staff',
        'signatures_villa',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function villa()
    {
        return $this->belongsTo(User::class, 'villa_id');
    }

    public function transaction()
    {
        // define one to one relationship to Transaction model
        return $this->hasOne(Transaction::class);
    }
}
