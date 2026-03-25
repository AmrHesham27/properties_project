<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'source_key',
        'location_name',
        'title',
        'bedrooms_count',
        'full_bathrooms_count',
        'view',
        'pet_friendly',
        'rent_amount',
        'rent_currency',
        'rent_period',
        'description',
        'neighborhood',
        'highlighted_features',
        'amenities',
        'getting_around',
        'image_urls',
        'main_image_url',
        'map_iframe_html',
    ];

    protected $casts = [
        'pet_friendly' => 'boolean',
        'highlighted_features' => 'array',
        'amenities' => 'array',
        'getting_around' => 'array',
        'image_urls' => 'array',
    ];
}

