<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class IdColumn extends TextColumn
{
    public static function create(string $label = 'ID'): static
    {
        return static::make('id')
            ->label($label)
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
