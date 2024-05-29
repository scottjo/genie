<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\Toggle;

class ActiveField extends Toggle
{
    public static function create(bool $inline = true): static
    {
        return static::make('active')
            ->inline($inline)
            ->onIcon('heroicon-o-check')
            ->offIcon('heroicon-o-x-mark')
            ->onColor('success')
            ->offColor('danger');
    }
}
