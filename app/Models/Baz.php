<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Baz extends Model
{
    public function morphables(): MorphMany
    {
        return $this->morphMany(Morphable::class, 'morphable');
    }
}
