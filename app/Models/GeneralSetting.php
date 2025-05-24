<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'footer_logo',
        'locale_general_user',
    ];
}
