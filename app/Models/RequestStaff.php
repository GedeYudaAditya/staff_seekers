<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'villa_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function villa()
    {
        return $this->belongsTo(User::class, 'villa_id', 'id');
    }
}
