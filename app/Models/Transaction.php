<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'month_year',
        'amount',
        'status',
        'transaction_image',
        'paid_at'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
