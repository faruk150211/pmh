<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'title_en',
        'title_bn',
        'content_en',
        'content_bn',
        'author_en',
        'author_bn',
        'picture',
        'show_on_home',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
    ];
}
