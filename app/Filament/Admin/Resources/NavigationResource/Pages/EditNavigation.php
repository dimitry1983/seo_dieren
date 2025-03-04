<?php

namespace App\Filament\Admin\Resources\NavigationResource\Pages;

use App\Filament\Admin\Resources\NavigationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
