<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'salary',
        'job_type',
        'deadline',
        'is_active',
        'employer_id',
        'category_id',
        'location_id',
        'skills',
        'highlight',
        'is_anonymous'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class, 'employer_id');
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }
    // public function seekers()
    // {
    //     return $this->belongsToMany(Seeker::class, 'job_seeker', 'job_id', 'seeker_id')->withPivot('status', 'id');
    // }

    public function seekers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'job_seeker', 'job_id', 'seeker_id')->withPivot('status', 'id', 'user_name', 'user_email', 'user_phone', 'user_cv', 'cover_letter');
    }
}
