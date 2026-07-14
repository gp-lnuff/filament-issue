<?php

namespace App\Filament\Resources\Morphables\Schemas;

use App\Models\Bar;
use App\Models\Baz;
use App\Models\Foo;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class MorphableForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                MorphToSelect::make('morphable')
                    ->live()
                    ->types([
                        MorphToSelect\Type::make(Foo::class)
                            ->titleAttribute('description'),
                        MorphToSelect\Type::make(Bar::class)
                            ->titleAttribute('description')
                            ->getOptionLabelFromRecordUsing(fn(Bar $record) => implode('/', [
                                $record->foo->description,
                                $record->description,
                            ]))
                            ->modifyOptionsQueryUsing(
                                fn(Builder $query) => $query
                                    ->orderByLeftPowerJoins('foo.description')
                                    ->orderBy('description')
                            ),
                        MorphToSelect\Type::make(Baz::class)
                            ->titleAttribute('description'),
                    ]),
                TextInput::make('value')
                    ->required()
                    ->numeric(),
            ]);
    }
}
