<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowItWorksSection extends Model
{
    protected $fillable = [
        'badge_en',
        'badge_bn',
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'step_1_title_en',
        'step_1_title_bn',
        'step_1_description_en',
        'step_1_description_bn',
        'step_1_icon',
        'step_2_title_en',
        'step_2_title_bn',
        'step_2_description_en',
        'step_2_description_bn',
        'step_2_icon',
        'step_3_title_en',
        'step_3_title_bn',
        'step_3_description_en',
        'step_3_description_bn',
        'step_3_icon',
        'step_4_title_en',
        'step_4_title_bn',
        'step_4_description_en',
        'step_4_description_bn',
        'step_4_icon',
    ];
}
