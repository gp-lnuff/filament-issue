<?php

namespace App\Filament\Resources\Morphables\Pages;

use App\Filament\Resources\Morphables\MorphableResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMorphable extends EditRecord
{
    protected static string $resource = MorphableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
