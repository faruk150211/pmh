<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title_en',
        'title_bn',
        'description_en',
        'description_bn',
        'slug_en',
        'slug_bn',
        'banner',
    ];
}
