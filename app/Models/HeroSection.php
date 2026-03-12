<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'image',
        'badge_1',
        'badge_1_en',
        'badge_1_bn',
        'badge_2',
        'badge_2_en',
        'badge_2_bn',
        'badge_3',
        'badge_3_en',
        'badge_3_bn',
        'stat_1_label_en',
        'stat_1_label_bn',
        'stat_1_en_value',
        'stat_1_bn_value',
        'stat_1_value',
        'stat_2_label_en',
        'stat_2_label_bn',
        'stat_2_en_value',
        'stat_2_bn_value',
        'stat_2_value',
        'stat_3_label_en',
        'stat_3_label_bn',
        'stat_3_en_value',
        'stat_3_bn_value',
        'stat_3_value',
        'emergency_hotline',
    ];
}
