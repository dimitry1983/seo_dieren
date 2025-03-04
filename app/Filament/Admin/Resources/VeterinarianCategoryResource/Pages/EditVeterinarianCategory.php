<?php

namespace App\Filament\Admin\Resources\VeterinarianCategoryResource\Pages;

use App\Filament\Admin\Resources\VeterinarianCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVeterinarianCategory extends EditRecord
{
    protected static string $resource = VeterinarianCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
