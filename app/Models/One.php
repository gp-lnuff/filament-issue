<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class One extends Model
{
    /** @use HasFactory<\Database\Factories\OneFactory> */
    use HasFactory;

    public function foos(): HasMany {
        return $this->hasMany(Foo::class);
    }

    public function bars(): HasMany {
        return $this->hasMany(Bar::class);
    }

    public function bazs(): HasMany {
        return $this->hasMany(Baz::class);
    }
}
