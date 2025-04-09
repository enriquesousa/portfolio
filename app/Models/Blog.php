<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    // Relación belongsTo category, no le podemos llamar category porque ya es una propiedad de la clase
    public function getCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category', 'id');
    }
}
