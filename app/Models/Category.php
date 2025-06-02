<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'status',
        'location',
        'type'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    protected $casts = [
        'status' => 'boolean',
        'seo_keywords' => 'array'
    ];
}
