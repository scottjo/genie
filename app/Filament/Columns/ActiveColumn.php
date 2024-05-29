<?php

namespace App\Filament\Columns;

use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Model;

class ActiveColumn extends ToggleColumn
{
    public static function create(bool $inline = true): static
    {
        return static::make('active')
            ->inline($inline)
            ->onIcon('heroicon-o-check')
            ->offIcon('heroicon-o-x-mark')
            ->onColor('success')
            ->offColor('danger')
            ->getStateUsing(function (Model $record) {
                return ($record->active);
            });
    }
}
