<?php

namespace App\Filament\Admin\Resources\VeterinariansPricingResource\Pages;

use App\Filament\Admin\Resources\VeterinariansPricingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinariansPricings extends ListRecords
{
    protected static string $resource = VeterinariansPricingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
