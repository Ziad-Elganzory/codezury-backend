<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g., View:User, Create:Post'),

                Select::make('guard_name')
                    ->required()
                    ->default('web')
                    ->options([
                        'web' => 'Web',
                        'api' => 'API',
                    ])
                    ->native(false),
            ]);
    }
}
