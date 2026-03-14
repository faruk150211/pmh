<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricing';

    protected $fillable = [
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'price',
        'price_label_en',
        'price_label_bn',
        'price_subtitle_en',
        'price_subtitle_bn',
        'currency',
        'feature_1_en',
        'feature_1_bn',
        'feature_2_en',
        'feature_2_bn',
        'feature_3_en',
        'feature_3_bn',
        'feature_4_en',
        'feature_4_bn',
        'feature_5_en',
        'feature_5_bn',
        'features_title_en',
        'features_title_bn',
        'note_en',
        'note_bn',
    ];
}
