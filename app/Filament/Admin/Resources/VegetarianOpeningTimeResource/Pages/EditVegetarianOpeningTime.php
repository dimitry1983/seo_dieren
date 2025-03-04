<?php

namespace App\Filament\Admin\Resources\VegetarianOpeningTimeResource\Pages;

use App\Filament\Admin\Resources\VegetarianOpeningTimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVegetarianOpeningTime extends EditRecord
{
    protected static string $resource = VegetarianOpeningTimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
