<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'hero_title', 'hero_subtitle', 'hero_tagline', 'hero_image',
        'welcome_message', 'welcome_title', 'welcome_name', 'welcome_photo',
        'statistic_member', 'statistic_activity',
        'brand_name', 'brand_logo', 'footer_description', 'footer_copyright',
    ];
}
