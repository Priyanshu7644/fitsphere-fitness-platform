<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'duration_days',
        'type',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
    ];
}
