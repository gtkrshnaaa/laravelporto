<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_position',
        'client_company',
        'client_avatar',
        'content',
        'rating',
        'is_approved',
        'display_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'display_order' => 'integer',
    ];
}
