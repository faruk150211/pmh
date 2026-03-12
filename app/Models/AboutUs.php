<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'heading_en',
        'heading_bn',
        'description_en',
        'description_bn',
        'main_title_en',
        'main_title_bn',
        'main_lead_en',
        'main_lead_bn',
        'main_description_en',
        'main_description_bn',
        'main_image',
        'floating_image',
        'stat_1_value',
        'stat_1_label_en',
        'stat_1_label_bn',
        'stat_2_value',
        'stat_2_label_en',
        'stat_2_label_bn',
        'stat_3_value',
        'stat_3_label_en',
        'stat_3_label_bn',
        'values_heading_en',
        'values_heading_bn',
        'values_description_en',
        'values_description_bn',
        'value_1_title_en',
        'value_1_title_bn',
        'value_1_description_en',
        'value_1_description_bn',
        'value_2_title_en',
        'value_2_title_bn',
        'value_2_description_en',
        'value_2_description_bn',
        'value_3_title_en',
        'value_3_title_bn',
        'value_3_description_en',
        'value_3_description_bn',
        'value_4_title_en',
        'value_4_title_bn',
        'value_4_description_en',
        'value_4_description_bn',
        'certifications_heading_en',
        'certifications_heading_bn',
        'certifications_description_en',
        'certifications_description_bn',
        'cert_1_image',
        'cert_2_image',
        'cert_3_image',
        'cert_4_image',
        'cert_5_image',
    ];
}
