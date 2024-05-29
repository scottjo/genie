<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\TextColumn;

class SlugColumn extends TextColumn
{
    public static function create(string $label = 'URL'): static
    {
        return static::make('slug')
            ->label($label)
            ->toggleable(isToggledHiddenByDefault: true);
    }

}
