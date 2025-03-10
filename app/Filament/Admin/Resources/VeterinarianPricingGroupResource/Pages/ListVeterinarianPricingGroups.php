<?php

namespace App\Filament\Admin\Resources\VeterinarianPricingGroupResource\Pages;

use App\Filament\Admin\Resources\VeterinarianPricingGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinarianPricingGroups extends ListRecords
{
    protected static string $resource = VeterinarianPricingGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
