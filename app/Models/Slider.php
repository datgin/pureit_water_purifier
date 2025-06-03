<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $guarded = [];
    public $timestamps = true;

    // public function getImageAttribute($value){
    //     return showImage($value);
    // }
}
