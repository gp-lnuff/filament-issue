<?php

namespace App\Filament\Resources\Morphables\Pages;

use App\Filament\Resources\Morphables\MorphableResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMorphable extends CreateRecord
{
    protected static string $resource = MorphableResource::class;
}
