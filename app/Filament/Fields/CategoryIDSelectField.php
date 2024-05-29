<?php

namespace App\Filament\Fields;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class CategoryIDSelectField extends Select
{
    public static function create(string $label = 'Catalogue Category', bool $required = false): static
    {
        return static::make('category_id')
            ->label($label)
            ->required($required)
            ->relationship(name: 'category', titleAttribute: 'name', modifyQueryUsing: fn(Builder $query) => $query->orderBy('parent_id')->orderBy('sort_order'));
    }
}
