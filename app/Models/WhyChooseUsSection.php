<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsSection extends Model
{
    protected $fillable = [
        'badge_en',
        'badge_bn',
        'title_en',
        'title_bn',
        'card_1_title_en',
        'card_1_title_bn',
        'card_1_description_en',
        'card_1_description_bn',
        'card_1_icon',
        'card_2_title_en',
        'card_2_title_bn',
        'card_2_description_en',
        'card_2_description_bn',
        'card_2_icon',
        'card_3_title_en',
        'card_3_title_bn',
        'card_3_description_en',
        'card_3_description_bn',
        'card_3_icon',
        'card_4_title_en',
        'card_4_title_bn',
        'card_4_description_en',
        'card_4_description_bn',
        'card_4_icon',
        'stat_1_number',
        'stat_1_label_en',
        'stat_1_label_bn',
        'stat_2_number',
        'stat_2_label_en',
        'stat_2_label_bn',
        'stat_3_number',
        'stat_3_label_en',
        'stat_3_label_bn',
    ];
}
