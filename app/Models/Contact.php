<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
