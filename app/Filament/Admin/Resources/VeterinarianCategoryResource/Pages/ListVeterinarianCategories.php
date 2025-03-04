<?php

namespace App\Filament\Admin\Resources\VeterinarianCategoryResource\Pages;

use App\Filament\Admin\Resources\VeterinarianCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVeterinarianCategories extends ListRecords
{
    protected static string $resource = VeterinarianCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
