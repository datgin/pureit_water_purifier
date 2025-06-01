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
        'description_short',
        'description',
        'title_seo',
        'description_seo',
        'view_count',
        'discount_type',
        'discount_value',
        'discount_start_date',
        'discount_end_date'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_value' => 'decimal:2',
        'discount_start_date' => 'datetime',
        'discount_end_date' => 'datetime',
    ];

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

    public function priceDiscount()
    {
        $now = now();
        $isInDiscountTime = true;

        if ($this->discount_start_date || $this->discount_end_date) {
            $start = $this->discount_start_date ? Carbon::parse($this->discount_start_date) : Carbon::minValue();
            $end = $this->discount_end_date ? Carbon::parse($this->discount_end_date) : Carbon::maxValue();
            $isInDiscountTime = $now->between($start, $end);
        }

        if ($isInDiscountTime) {
            if ($this->discount_type === 'percentage') {
                return round($this->price * (1 - ($this->discount_value / 100)), 0);
            }

            if ($this->discount_type === 'amount') {
                return max(0, $this->price - $this->discount_value);
            }
        }

        return $this->price;
    }


    public function getDiscountPercentAttribute()
    {
        if ($this->discount_type === 'percentage') {
            return $this->discount_value;
        }

        if ($this->discount_type === 'amount' && $this->price > 0) {
            return round(($this->discount_value / $this->price) * 100, 0);
        }

        return 0;
    }

    public function getFinalPriceAttribute()
    {
        return $this->priceDiscount();
    }

}
