<?php

namespace App\Filament\Resources\PickupPointsResource\Pages;

use App\Filament\Resources\PickupPointsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPickupPoints extends EditRecord
{
    protected static string $resource = PickupPointsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
