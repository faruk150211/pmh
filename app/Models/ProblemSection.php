<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProblemSection extends Model
{
    protected $fillable = [
        'badge_en',
        'badge_bn',
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'problem_1_title_en',
        'problem_1_title_bn',
        'problem_1_description_en',
        'problem_1_description_bn',
        'problem_1_icon',
        'problem_2_title_en',
        'problem_2_title_bn',
        'problem_2_description_en',
        'problem_2_description_bn',
        'problem_2_icon',
        'problem_3_title_en',
        'problem_3_title_bn',
        'problem_3_description_en',
        'problem_3_description_bn',
        'problem_3_icon',
        'problem_4_title_en',
        'problem_4_title_bn',
        'problem_4_description_en',
        'problem_4_description_bn',
        'problem_4_icon',
    ];
}
