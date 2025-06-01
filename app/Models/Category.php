<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
        'title_seo',
        'description_seo',
        'keyword_seo',
        'description_short',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
