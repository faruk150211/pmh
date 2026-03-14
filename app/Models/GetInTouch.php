<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetInTouch extends Model
{
    protected $table = 'get_in_touch';

    protected $fillable = [
        'badge_en',
        'badge_bn',
        'heading_en',
        'heading_bn',
        'description_en',
        'description_bn',
        'contact_1_title_en',
        'contact_1_title_bn',
        'contact_1_value_en',
        'contact_1_value_bn',
        'contact_1_description_en',
        'contact_1_description_bn',
        'contact_2_title_en',
        'contact_2_title_bn',
        'contact_2_value_en',
        'contact_2_value_bn',
        'contact_2_description_en',
        'contact_2_description_bn',
        'contact_3_title_en',
        'contact_3_title_bn',
        'contact_3_value_en',
        'contact_3_value_bn',
        'contact_3_description_en',
        'contact_3_description_bn',
    ];
}
