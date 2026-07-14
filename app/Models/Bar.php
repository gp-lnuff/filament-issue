<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Bar extends Model
{
    public function foo(): BelongsTo
    {
        return $this->belongsTo(Foo::class);
    }

    public function morphables(): MorphMany
    {
        return $this->morphMany(Morphable::class, 'morphable');
    }
}
