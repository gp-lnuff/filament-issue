<?php

namespace App\Filament\Resources\Ones\Pages;

use App\Filament\Resources\Ones\OneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnes extends ListRecords
{
    protected static string $resource = OneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
