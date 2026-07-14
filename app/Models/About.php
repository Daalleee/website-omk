<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'history', 'vision', 'mission', 'goals', 'logo', 'logo_meaning',
        'pastor_name', 'pastor_photo', 'pastor_bio',
    ];
}
