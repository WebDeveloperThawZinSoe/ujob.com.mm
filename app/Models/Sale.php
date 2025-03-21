<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'membership_id',
        'status',
        'payment_asset',
        'user_name',
        'user_email',
        'user_phone',
        'user_note',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class, 'membership_id');
    }
}
