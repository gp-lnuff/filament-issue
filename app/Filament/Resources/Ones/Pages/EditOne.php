<?php

namespace App\Filament\Resources\Ones\Pages;

use App\Filament\Resources\Ones\OneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOne extends EditRecord
{
    protected static string $resource = OneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
