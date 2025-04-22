<?php

namespace App\Filament\Admin\Resources\NavigationResource\Pages;

use App\Filament\Admin\Resources\NavigationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNavigation extends CreateRecord
{
    protected static string $resource = NavigationResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {    
        $data['site_id'] = session('website')->id;       
        return $data;
    }
}
