<?php

namespace App\Filament\Resources\Morphables;

use App\Filament\Resources\Morphables\Pages\CreateMorphable;
use App\Filament\Resources\Morphables\Pages\EditMorphable;
use App\Filament\Resources\Morphables\Pages\ListMorphables;
use App\Filament\Resources\Morphables\Schemas\MorphableForm;
use App\Filament\Resources\Morphables\Tables\MorphablesTable;
use App\Models\Morphable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MorphableResource extends Resource
{
    protected static ?string $model = Morphable::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'value';

    public static function form(Schema $schema): Schema
    {
        return MorphableForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MorphablesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMorphables::route('/'),
            'create' => CreateMorphable::route('/create'),
            'edit' => EditMorphable::route('/{record}/edit'),
        ];
    }
}
