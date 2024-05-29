<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\TextInput;

class ModelField extends TextInput
{
    public static function create(bool $required = false, string $label = 'Model'): static
    {
        return static::make('model')
            ->label($label)
            ->required($required)
            ->maxLength(255)
            ->columnSpan(1);
    }
}
