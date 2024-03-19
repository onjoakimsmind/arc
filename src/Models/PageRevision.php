<?php

namespace Onjoakimsmind\Arc\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageRevision extends Model
{
    use HasFactory;

    protected $fillable = ['page_id', 'html', 'style'];
}
