<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoScoreNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'new_id',
        'seo_score'
    ];
    public function new()
    {
        return $this->belongsTo(News::class, 'new_id');
    }

}
