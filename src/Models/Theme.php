<?php

namespace Onjoakimsmind\Arc\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'active'];
    protected $casts = [
        'active' => 'boolean',
    ];
}
