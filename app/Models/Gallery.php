<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['activity_id', 'album_name', 'image', 'caption'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
