<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\TextInput;

class ExternalIDField extends TextInput
{
    public static function create(bool $required = false, string $label = 'External ID'): static
    {
        return static::make('external_id')
            ->label($label)
            ->required($required)
            ->maxLength(255);
    }
}
