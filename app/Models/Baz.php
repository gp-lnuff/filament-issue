<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baz extends Model
{
    /** @use HasFactory<\Database\Factories\BazFactory> */
    use HasFactory;
}
