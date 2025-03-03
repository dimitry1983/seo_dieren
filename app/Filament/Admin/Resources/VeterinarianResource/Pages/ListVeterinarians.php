<?php

namespace App\Filament\Admin\Resources\VeterinarianResource\Pages;

use App\Filament\Admin\Resources\VeterinarianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinarians extends ListRecords
{
    protected static string $resource = VeterinarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
