<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

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
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'remove_at' => 'datetime',
    ];
}
