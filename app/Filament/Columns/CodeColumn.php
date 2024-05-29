<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class CodeColumn extends TextColumn
{
    public static function create(string $label = 'Code'): static
    {
        return static::make('code')
            ->label($label)
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
