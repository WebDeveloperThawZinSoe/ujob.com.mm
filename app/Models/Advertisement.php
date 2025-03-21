<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_url',
        'target_url',
        'location',
        'start_date',
        'end_date',
    ];
}
