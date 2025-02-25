<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class BrandResource extends Resource
{
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'name' => $record->name,
            'slug' => $record->slug,
        ];
    }

    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->maxLength(255)
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(string $operation, $state, Set $set) =>
                    $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                TextInput::make('slug')
                    ->maxLength(255)
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(Brand::class, 'slug', ignoreRecord: true),

                FileUpload::make('image')
                    ->label('logo')
                    ->image()
                    ->columnSpanFull()
                    ->directory('brands')
                    ->required(),

                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image'),

                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make(
                    [
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
                    ]
                )
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
