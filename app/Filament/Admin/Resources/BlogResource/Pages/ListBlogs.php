<?php

namespace App\Filament\Admin\Resources\BlogResource\Pages;

use App\Filament\Admin\Resources\BlogResource;
use App\Models\Blog;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;

class ListBlogs extends ListRecords
{
    protected static string $resource = BlogResource::class;

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
                return Blog::where('status', 'pending')->count();})
                ->badgeColor('primary')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('status', 'pending')),
            'Active' => Tab::make()->badge(function( ){
                    return Blog::where('status', 'active')->count();})
                    ->badgeColor('success')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('status', 'active')),
            'Declined' => Tab::make()->badge(function( ){
                    return Blog::where('status', 'declined')->count();})
                    ->badgeColor('danger')->modifyQueryUsing(fn (EloquentBuilder $query) => $query->where('status', 'declined')),                 
        ];

    }
}
