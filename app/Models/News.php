<?php

namespace App\Models;

use App\RankmathSEOForLaravel\DTO\SeoAnalysisResult;
use App\RankmathSEOForLaravel\Services\SeoAnalyzer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SeoScoreNews;
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

    public function getSeoAnalysisAttribute(): ?SeoAnalysisResult
    {
        if (!$this->seo_title) {
            return null;
        }

        $analyzer = app(SeoAnalyzer::class);
        return $analyzer->analyzeFromBlog($this);
    }

    public function seoScore()
    {
        return $this->hasOne(SeoScoreNews::class, 'new_id', 'id');
    }
}
