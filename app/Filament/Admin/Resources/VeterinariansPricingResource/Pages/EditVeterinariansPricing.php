<?php

namespace App\Filament\Admin\Resources\VeterinariansPricingResource\Pages;

use App\Filament\Admin\Resources\VeterinariansPricingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVeterinariansPricing extends EditRecord
{
    protected static string $resource = VeterinariansPricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
