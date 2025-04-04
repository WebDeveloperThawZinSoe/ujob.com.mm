<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order'
    ];
    

    public function jobs()
    {
        return $this->hasMany(\App\Models\Job::class, 'category_id');
    }
}
