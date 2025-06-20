<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'offers',
        'commitments',
    ];

    protected $casts = [
        'offers' => 'array',
        'commitments' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
