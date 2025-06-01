<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
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
        'seo_keyword',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'remove_at' => 'datetime',
    ];

}
