<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProject extends Model
{
    use HasFactory;
    protected $fillable = ['seeker_id', 'title', 'description', 'start_date', 'end_date'];

    public function seeker()
    {
        return $this->belongsTo(Seeker::class);
    }
}
