<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders',
            Order::query()->where('status','new')->count()),

            Stat::make('Order Processing',
            order::query()->where('status','processing')->count()),

            Stat::make('Order Shipped',
            order::query()->where('status','shipped')->count()),

            Stat::make('Average Price',
            Number::currency(order::query()->avg('grand_total') ?? 0,'Kshs'))
        ];
    }
}
