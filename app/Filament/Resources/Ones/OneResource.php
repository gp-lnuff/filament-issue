<?php

namespace App\Filament\Resources\Ones;

use App\Filament\Resources\Ones\Pages\CreateOne;
use App\Filament\Resources\Ones\Pages\EditOne;
use App\Filament\Resources\Ones\Pages\ListOnes;
use App\Filament\Resources\Ones\RelationManagers\BarsRelationManager;
use App\Filament\Resources\Ones\RelationManagers\BazsRelationManager;
use App\Filament\Resources\Ones\RelationManagers\FoosRelationManager;
use App\Filament\Resources\Ones\Schemas\OneForm;
use App\Filament\Resources\Ones\Tables\OnesTable;
use App\Models\One;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OneResource extends Resource
{
    protected static ?string $model = One::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return OneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OnesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            FoosRelationManager::class,
            BarsRelationManager::class,
            BazsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOnes::route('/'),
            'create' => CreateOne::route('/create'),
            'edit' => EditOne::route('/{record}/edit'),
        ];
    }
}
