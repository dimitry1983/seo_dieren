<?php

namespace App\Filament\Admin\Resources\SeopageResource\Pages;

use App\Filament\Admin\Resources\SeopageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeopages extends ListRecords
{
    protected static string $resource = SeopageResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),
        ];
    }
}
