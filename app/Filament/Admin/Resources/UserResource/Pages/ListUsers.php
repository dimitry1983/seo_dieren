<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Components\Tab;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Pending' => Tab::make()->badge(function( ){
                return User::where('active', 0)
                        ->where('blocked', 0)
                        ->where('deleted', 0)->count();})
                ->badgeColor('primary')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('active', 0)->where('blocked', 0)->where('deleted', 0)),
            'Active' => Tab::make()->badge(function( ){
                    return User::where('active', 1)
                            ->where('blocked', 0)
                            ->where('deleted', 0)->count();})
                    ->badgeColor('success')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('active', 1)->where('blocked', 0)->where('deleted', 0)),
            'Blocked' => Tab::make()->badge(function( ){
                    return User::where('blocked', 1)->count();})
                    ->badgeColor('danger')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('blocked', 1)),  
            'Deleted' => Tab::make()->badge(function( ){
                    return User::where('deleted', 1)->count();})
                    ->badgeColor('danger')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('deleted', 1)),                     
        ];

    }
}
