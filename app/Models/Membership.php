<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'short_detail',
        'summary',
        'order',
        'total_job',
        'highlight_job',
        'is_feature_company',
        'price',
        'pre_question',
        'bluk_cvs',
        'auto_match'
    ];
}
