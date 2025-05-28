<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keyword extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'keywords';

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Sản phẩm liên quan đến từ khóa này.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_keyword', 'keyword_id', 'product_id');
    }
}
