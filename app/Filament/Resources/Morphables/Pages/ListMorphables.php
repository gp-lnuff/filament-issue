<?php

namespace App\Filament\Resources\Morphables\Pages;

use App\Filament\Resources\Morphables\MorphableResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMorphables extends ListRecords
{
    protected static string $resource = MorphableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
