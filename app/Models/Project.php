<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'tech_stack',
        'repository_url',
        'live_url',
        'view_count',
        'is_featured',
        'size',
        'featured_image',
        'display_order',
    ];


    protected $casts = [
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'view_count' => 'integer',
    ];
}
