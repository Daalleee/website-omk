<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'photo', 'name', 'period', 'gender', 'birth_place', 'birth_date',
        'address', 'phone', 'division', 'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
