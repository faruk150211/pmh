<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverageArea extends Model
{
    protected $table = 'coverage_areas';

    protected $fillable = [
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'show_on_home',
        'order',
    ];
}
