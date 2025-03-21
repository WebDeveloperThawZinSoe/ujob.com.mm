<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    protected $table = 'job_seeker';

    protected $fillable = [
        'job_id',
        'seeker_id',
        'status',
        'user_name',
        'user_email',
        'user_phone',
        'user_cv',
        'cover_letter'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function seeker()
    {
        return $this->belongsTo(\App\Models\User::class, 'seeker_id');
    }

}
