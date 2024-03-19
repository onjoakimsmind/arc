<?php

namespace Onjoakimsmind\Arc\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'style'];

    public function revisions(): HasMany
    {
        return $this->hasMany(PageRevision::class);
    }
}
