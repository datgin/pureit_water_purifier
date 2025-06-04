<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'short_description',
        'content',
        'posted_at',
        'remove_at',
        'view_count',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'type'
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'remove_at' => 'datetime',
        'seo_keywords' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageAttribute($value)
    {
        return showImage($value);
    }
}
