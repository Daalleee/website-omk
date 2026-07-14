<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'category_id', 'title', 'slug', 'thumbnail', 'banner',
        'description', 'activity_date', 'location', 'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
