<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\NavigationResource\Pages;
use App\Filament\Admin\Resources\NavigationResource\RelationManagers;
use App\Models\Navigation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Filament\Tables;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()
            ->columns(1)
            ->columnSpan(3)
            ->schema([
            TextInput::make('title')
                ->label(__('Name'))
                ->live('onBlur')
                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }
                
                    $set('slug', Str::slug($state));
                })
                ->required(),
            TextInput::make('slug')
                ->label(__('Slug'))
                ->unique(ignoreRecord: true)
                ->visibleOn('create')
                ->required(),
            Select::make('location')
                ->label(__('Location'))
                ->options([
                    'no-location' => __('No location'),
                    'header' => __('Header'),
                    'footer' => __('Footer'),
                ])
                ->default('no-location')
                ->native(false),
            Repeater::make('content')
                ->label(__('Content'))
                ->schema([
                    TextInput::make('title')
                    ->label(__('Title')),
                    TextInput::make('link')
                    ->label(__('URL')),
                    Section::make()
                    ->schema([
                        Repeater::make('submenu')
                        ->label(__('Sub menu'))
                        ->schema([
                            TextInput::make('title')
                            ->label(__('Title')),
                            TextInput::make('link')
                            ->label(__('URL')),
                        ])
                            ->columns(2)
                            ->columnSpan(2)
                            ->reorderable(true)
                            ->defaultItems(0)
                            ->addActionLabel(__('Add submenu item'))
                    ])
            ])
            ->columns(2)
            ->reorderable(true)
            ->addActionLabel(__('Add menu item'))
            ])
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
                ->columns([
                    TextColumn::make('title'),
                    TextColumn::make('location')
                ])
                ->filters([

                ])
                ->actions([
                    Tables\Actions\ActionGroup::make([
                        ReplicateAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make()
                    ])
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNavigations::route('/'),
            'create' => Pages\CreateNavigation::route('/create'),
            'edit' => Pages\EditNavigation::route('/{record}/edit'),
        ];
    }
}
