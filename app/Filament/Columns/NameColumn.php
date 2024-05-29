<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class NameColumn extends TextColumn
{
    public static function create(string $label = 'Name'): static
    {
        return static::make('name')
            ->label($label);
    }
}
