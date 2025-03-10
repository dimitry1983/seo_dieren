<?php

namespace App\Filament\Admin\Resources\VeterinarianPricingGroupResource\Pages;

use App\Filament\Admin\Resources\VeterinarianPricingGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVeterinarianPricingGroup extends EditRecord
{
    protected static string $resource = VeterinarianPricingGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
