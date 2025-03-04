<?php

namespace App\Filament\Admin\Resources\VeterinariansImageResource\Pages;

use App\Filament\Admin\Resources\VeterinariansImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinariansImages extends ListRecords
{
    protected static string $resource = VeterinariansImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
