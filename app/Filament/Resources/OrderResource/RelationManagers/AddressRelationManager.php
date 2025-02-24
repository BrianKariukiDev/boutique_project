<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\PickupPoint;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'address';

    

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Hidden::make('order_id')
                    ->dehydrated()
                    ->default(fn()=>static::getOwnerRecord()->id),

                Hidden::make('user_id')
                    ->dehydrated()
                    ->default(fn()=>static::getOwnerRecord()->user_id),

                TextInput::make('longitude')
                    ->required()
                    ->numeric()
                    ->step(0.0000001)
                    ->rules(['between: -180,180'])
                    ->live()
                    ->afterStateUpdated(fn(Get $get, Set $set)
                        =>$set('is_pickup_point',PickupPoint::where('longitude',$get('longitude'))
                            ->where('latitude',$get('latitude'))
                            ->exists())),

                TextInput::make("latitude")
                    ->required()
                    ->numeric()
                    ->step(0.0000001)
                    ->rules(['between: -90,90'])
                    ->live()
                    ->afterStateUpdated(fn(Get $get, Set $set)
                        =>$set('is_pickup_point',PickupPoint::where('longitude',$get('longitude'))
                            ->where('latitude',$get('latitude'))
                            ->exists())),

                ToggleButtons::make('is_pickup_point')
                    ->boolean()
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('longitude')
            ->columns([
                Tables\Columns\TextColumn::make('longitude')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('latitude')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->disabled(fn()=>static::getOwnerRecord()->address()->exists()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
