<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_website',
        'company_description',
        'user_id',
        'phone',
        'location_id',
        'end_date',
        'total_jobs',
        'total_highlights',
        'membership_name',
        'is_feature',
        'pre_question',
        'auto_match',
        'bulk_cvs'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }
    
    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class, 'employer_id');
    }
    public function activeJobs()
    {
        return $this->hasMany(\App\Models\Job::class, 'employer_id')->where('is_active', 1);
    }

}
