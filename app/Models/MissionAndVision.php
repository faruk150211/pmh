<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionAndVision extends Model
{
    protected $table = 'mission_and_vision';

    protected $fillable = [
        'heading_en',
        'heading_bn',
        'description_en',
        'description_bn',
        'mission_heading_en',
        'mission_heading_bn',
        'mission_content_en',
        'mission_content_bn',
        'mission_image',
        'vision_heading_en',
        'vision_heading_bn',
        'vision_content_en',
        'vision_content_bn',
        'vision_image',
        'commitment_heading_en',
        'commitment_heading_bn',
        'commitment_description_en',
        'commitment_description_bn',
        'commitment_1_icon',
        'commitment_1_title_en',
        'commitment_1_title_bn',
        'commitment_1_description_en',
        'commitment_1_description_bn',
        'commitment_2_icon',
        'commitment_2_title_en',
        'commitment_2_title_bn',
        'commitment_2_description_en',
        'commitment_2_description_bn',
        'commitment_3_icon',
        'commitment_3_title_en',
        'commitment_3_title_bn',
        'commitment_3_description_en',
        'commitment_3_description_bn',
        'commitment_4_icon',
        'commitment_4_title_en',
        'commitment_4_title_bn',
        'commitment_4_description_en',
        'commitment_4_description_bn',
    ];
}
