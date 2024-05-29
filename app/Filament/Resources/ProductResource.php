<?php

namespace App\Filament\Resources;

use App\Filament\Columns\ActiveColumn;
use App\Filament\Columns\NameColumn;
use App\Filament\Fields\ActiveField;
use App\Filament\Fields\CategoryIDSelectField;
use App\Filament\Fields\CodeField;
use App\Filament\Fields\ModelField;
use App\Filament\Fields\NameField;
use App\Filament\Fields\SlugField;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ActiveField::create(inline: false)
                    ->default(true),
                NameField::create(required: true)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                SlugField::create(required: true, label: 'URL')
                    ->disabled()
                    ->dehydrated(),
                CodeField::create(),
                ModelField::create(),
                CategoryIDSelectField::create()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ActiveColumn::create(),
                NameColumn::create(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
