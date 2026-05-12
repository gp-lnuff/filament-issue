<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->default('test'),
                Select::make('email')
                    ->label('Email address')
                    ->live()
                    ->required()
                    ->options([
                        1 => 'first@mail.local',
                        2 => 'second@mail.local',
                    ])
                    #->afterStateUpdated(fn(Set $set) => $set('password', 'commonPassword'))
                    #->afterStateUpdated(fn($state, Set $set) => $set('password', match($state){
                    #    1 => 'password3',
                    #    2 => 'password4',
                    #}))
                    ,
                DateTimePicker::make('email_verified_at'),
                Select::make('password')
                    ->options(fn(Get $get) => match($get('email')) {
                        1 => [
                            'password1' => 'password1',
                            'password2' => 'password2',
                            'password3' => 'password3',
                            #'commonPassword' => 'common password'
                        ],
                        2 => [
                            #'commonPassword' => 'common password',
                            'password4' => 'password4',
                            'password5' => 'password5',
                            'password6' => 'password6'
                        ],
                        default =>[]
                    })
            ]);
    }
}
