<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogTime extends Model
{
    protected $guarded = [];

    // Relación con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
