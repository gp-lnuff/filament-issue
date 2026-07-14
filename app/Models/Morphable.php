<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Morphable extends Model
{
    public function morphable(): MorphTo
    {
        return $this->morphTo('morphable');
    }
}
