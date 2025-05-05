<?php

namespace App\Filament\Admin\Resources\SeoVeterinarianResource\Pages;

use App\Filament\Admin\Resources\SeoVeterinarianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoVeterinarians extends ListRecords
{
    protected static string $resource = SeoVeterinarianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
