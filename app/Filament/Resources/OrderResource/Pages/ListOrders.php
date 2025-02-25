<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'null'=>Tab::make('All'),
            'new'=>Tab::make('New')
                ->query(fn($query)=>$query->where('status','new')),

            'processing' => Tab::make('Processing')->
            query(fn($query)=>$query->where('status','processing')),

            'shipped' => Tab::make('Shipped')->
            query(fn($query)=>$query->where('status','shipped')),

            'delivered' => Tab::make('Delivered')->
            query(fn($query)=>$query->where('status','delivered')),

            'canceled' => Tab::make('Canceled')->
            query(fn($query)=>$query->where('status','canceled')),
        ];
    }
}
