<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\TextInput;

class NameField extends TextInput
{
    public static function create(bool $required = false, string $label = 'Name'): static
    {
        return static::make('name')
            ->label($label)
            ->required($required)
            ->maxLength(255);
    }
}
