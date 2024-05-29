<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class ExternalIDColumn extends TextColumn
{
    public static function create(string $label = 'External ID'): static
    {
        return static::make('external_id')
            ->label($label)
            ->searchable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
