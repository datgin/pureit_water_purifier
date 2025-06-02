<?php

namespace App\Models;

use App\RankmathSEOForLaravel\DTO\SeoAnalysisResult;
use App\RankmathSEOForLaravel\Services\SeoAnalyzer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price',
        'slug',
        'description',
        'cross_sell',
        'title_seo',
        'description_seo',
        'view_count',
        'discount_value',
        'discount_start_date',
        'discount_end_date',
        'manual_vi',
        'manual_en',
        'status',
        'is_featured',
        'features'

    ];

    protected $casts = [
        'status' => 'boolean',
        'discount_start_date' => 'datetime',
        'discount_end_date' => 'datetime',
        'cross_sell' => 'array',
        'features' => 'array',
        'is_featured' => 'boolean'
    ];

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values')
            ->withPivot('attribute_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'product_keyword', 'product_id', 'keyword_id');
    }

    public function getSeoAnalysisAttribute(): ?SeoAnalysisResult
    {
        if (!$this->title_seo) {
            return null;
        }

        $analyzer = app(SeoAnalyzer::class);
        return $analyzer->analyzeFromBlog($this);
    }

    public function seoScoreProduct()
    {
        return $this->hasOne(SeoScoreProduct::class, 'product_id', 'id');
    }

    public function getImageAttribute($value)
    {
        return showImage($value);
    }
}
