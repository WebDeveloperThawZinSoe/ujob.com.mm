<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'order'
    ];

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class, 'location_id');
    }

    public function employers()
    {
        return $this->hasMany(\App\Models\Employer::class, 'location_id');
    }
}
