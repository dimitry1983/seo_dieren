<?php

namespace App\Filament\Admin\Resources\PageResource\Pages;

use App\Filament\Admin\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Page;
use Filament\Resources\Components\Tab;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {

        return [
            'Active' => Tab::make()->badge(function( ){
                return Page::whereNull('deleted_at')->count();})
                ->badgeColor('success')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->whereNull('deleted_at')),  
            'Deleted' => Tab::make()->badge(function( ){
                    return Page::onlyTrashed()->count();})
                    ->badgeColor('danger')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->onlyTrashed()),                     
        ];
    }
}
