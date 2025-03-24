<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'headline',
        'summary',
        'user_id',
        'skills',
        'contact_number',
        'viber_number',
        'open_to_work'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function seekerExperiences()
    {
        return $this->hasMany(\App\Models\SeekerExperience::class, 'seeker_id');
    }

    public function seekerEducations()
    {
        return $this->hasMany(\App\Models\SeekerEducation::class, 'seeker_id');
    }


    public function seekerProjects()
    {
        return $this->hasMany(\App\Models\SeekerProject::class, 'seeker_id');
    }

}
