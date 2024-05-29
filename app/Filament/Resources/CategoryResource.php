<?php

namespace App\Filament\Resources;

use App\Filament\Columns\ActiveColumn;
use App\Filament\Columns\CodeColumn;
use App\Filament\Columns\ExternalIDColumn;
use App\Filament\Columns\IdColumn;
use App\Filament\Columns\NameColumn;
use App\Filament\Columns\SlugColumn;
use App\Filament\Fields\ActiveField;
use App\Filament\Fields\CodeField;
use App\Filament\Fields\ExternalIDField;
use App\Filament\Fields\NameField;
use App\Filament\Fields\SlugField;
use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

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
                ExternalIDField::create(required: true, label: 'ID'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->striped()
            ->columns([
                NameColumn::create(),
                ActiveColumn::create(),
                CodeColumn::create(),
                SlugColumn::create(),
                IdColumn::create(),
                ExternalIDColumn::create(),
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
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
