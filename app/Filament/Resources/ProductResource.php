<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'user.name' => $record->name
        ];
    }
    
    protected static ?int $navigationSort=5;

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2X2';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Group::make([
                Section::make('Product Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur:true)
                            ->afterStateUpdated(fn(string $operation,$state,Set $set)=>
                                $operation==='create'?$set('slug',Str::slug($state)):null),

                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255)
                            ->unique(Product::class,'slug',ignoreRecord:true),

                        MarkdownEditor::make('description')
                            ->fileAttachmentsDirectory('products')
                            ->columnSpan(2),
                    ])->columns(2),

                Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('images')
                            ->required()
                            ->multiple()
                            ->directory('products')
                            ->maxFiles(5)
                            ->reorderable()
                    ])
            ])->columnSpan(2),

            Group::make([
                Section::make('Price')
                    ->schema([
                        TextInput::make('buying_price')
                            ->required()
                            ->numeric()
                            ->prefix('Kshs')
                            ->minValue(0),

                        TextInput::make('sale_price')
                            ->required()
                            ->numeric()
                            ->prefix('Kshs')
                            ->minValue(0),
                    ]),

                Section::make('Associations')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('category', 'name'),

                        Forms\Components\Select::make('brand_id')
                            ->required()
                            ->preload()
                            ->searchable()
                            ->relationship('brand', 'name'),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('in_stock')
                            ->default(true)
                            ->required(),

                        Toggle::make('in_active')
                        ->default(true)
                        ->required(),

                    Toggle::make('is_featured')
                        ->required(),

                    Toggle::make('on_sale')
                        ->required(),
                    ])
            ])->columnSpan(1),
        ])->columns(3);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->sortable(),

                TextColumn::make('brand.name')
                    ->sortable(),

                TextColumn::make('buying_price')
                    ->sortable()
                    ->money('Kshs'),

                TextColumn::make('sale_price')
                    ->sortable()
                    ->money('Kshs'),
                
                IconColumn::make('is_featured')
                    ->boolean(),
                
                IconColumn::make('on_sale')
                    ->boolean(),
                
                IconColumn::make('is_active')
                    ->boolean(),
                
                IconColumn::make('in_stock')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault:true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category','name'),

                SelectFilter::make('brands')
                    ->relationship('brand','name'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
