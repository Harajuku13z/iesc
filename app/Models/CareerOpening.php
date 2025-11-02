<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerOpening extends Model
{
    protected $fillable = [
        'title',
        'type',
        'description',
        'location',
        'is_active',
    ];
}
