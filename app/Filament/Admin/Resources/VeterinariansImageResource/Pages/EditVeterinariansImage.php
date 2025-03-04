<?php

namespace App\Filament\Admin\Resources\VeterinariansImageResource\Pages;

use App\Filament\Admin\Resources\VeterinariansImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVeterinariansImage extends EditRecord
{
    protected static string $resource = VeterinariansImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
