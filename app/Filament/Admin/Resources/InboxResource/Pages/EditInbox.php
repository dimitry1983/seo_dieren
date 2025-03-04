<?php

namespace App\Filament\Admin\Resources\InboxResource\Pages;

use App\Filament\Admin\Resources\InboxResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInbox extends EditRecord
{
    protected static string $resource = InboxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
