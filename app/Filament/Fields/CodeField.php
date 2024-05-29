<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\TextInput;

class CodeField extends TextInput
{
    public static function create(bool $required = false, string $label = 'Code'): static
    {
        return static::make('code')
            ->label($label)
            ->required($required)
            ->maxLength(255);
    }
}
