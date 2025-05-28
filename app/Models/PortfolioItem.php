<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'image',
        'foto1',
        'foto2',
        'title',
        'category_id',
        'description',
        'description_en',
        'client',
        'website',
        'local_website'
    ];

    // Relación con la tabla categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
