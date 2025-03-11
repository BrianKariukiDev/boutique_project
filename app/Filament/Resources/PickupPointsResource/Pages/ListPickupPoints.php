<?php

namespace App\Filament\Resources\PickupPointsResource\Pages;

use App\Filament\Resources\PickupPointsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPickupPoints extends ListRecords
{
    protected static string $resource = PickupPointsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
