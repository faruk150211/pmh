<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'lang',
        'slug',
        'default',
        'status',
    ];

    protected $casts = [
        'default' => 'boolean',
        'status' => 'boolean',
    ];
}
