<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'subtitle_en',
        'subtitle_bn',
        'quote_en',
        'quote_bn',
        'vision_heading_en',
        'vision_heading_bn',
        'vision_description_en',
        'vision_description_bn',
        'highlight_1_title_en',
        'highlight_1_title_bn',
        'highlight_1_description_en',
        'highlight_1_description_bn',
        'highlight_2_title_en',
        'highlight_2_title_bn',
        'highlight_2_description_en',
        'highlight_2_description_bn',
        'highlight_3_title_en',
        'highlight_3_title_bn',
        'highlight_3_description_en',
        'highlight_3_description_bn',
        'badge_label_en',
        'badge_label_bn',
        'picture',
    ];
}
