<?php

namespace App\Filament\Admin\Resources\SeopageResource\Pages;

use App\Filament\Admin\Resources\SeopageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeopage extends EditRecord
{
    protected static string $resource = SeopageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
