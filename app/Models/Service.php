<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_class',
        'price_start',
        'is_popular',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'price_start' => 'integer',
    ];
}
