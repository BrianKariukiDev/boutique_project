<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Order ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('grand_total')
                    ->label('Grand Total')
                    ->sortable()
                    ->searchable()
                    ->money('Kshs'),

                TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->color(fn($state)=>match($state){
                        'new'=>'info',
                        'processing'=>'warning',
                        'shipped'=>'success',
                        'delivered'=>'success',
                        'canceled'=>'danger',
                    })

                    ->icon(fn($state)=>match($state){
                        'new'=>'heroicon-m-sparkles',
                        'processing'=>'heroicon-m-arrow-path',
                        'shipped'=>'heroicon-m-truck',
                        'delivered'=>'heroicon-m-check-badge',
                        'canceled'=>'heroicon-m-x-circle',
                    }),

                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime()
                    ->label('Order Date'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->url(fn($record)=>OrderResource::getUrl('create',['record'=>$record])),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn($record)=>OrderResource::getUrl('view',['view','record'=>$record]))
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
