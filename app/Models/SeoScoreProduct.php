<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoScoreProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'seo_score'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
