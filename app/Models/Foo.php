<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Foo extends Model
{
    public function morphables(): MorphMany
    {
        return $this->morphMany(Morphable::class, 'morphable');
    }

    public function bar(): HasMany
    {
        return $this->hasMany(Bar::class);
    }
}
