<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = [
        'photo', 'name', 'position', 'period', 'motto', 'order_number', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
