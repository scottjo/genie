<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\TextInput;

class SlugField extends TextInput
{
    public static function create(bool $required = false, string $label = 'Slug'): static
    {
        return static::make('slug')
            ->label($label)
            ->required($required)
            ->maxLength(255);
    }
}
