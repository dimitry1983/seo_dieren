<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PageResource\Pages;
use App\Filament\Admin\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Illuminate\Support\Str;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Builder as ComponentsBuilder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\SEO\SEO;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = 'Content management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        $schema = getPageBuilderSchema();

        return $form
        ->schema([
            Section::make()
            ->schema([
                Forms\Components\TextInput::make('site_id')
                    ->hidden()
                    ->default(session('website')->id)
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->live(onBlur:true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),    
                RichEditor::make('content')
                    ->columnSpanFull()
                    ->live()
                    ->minLength(10)
                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  RichEditor $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }), 
                RichEditor::make('excerpt')
                    ->columnSpanFull()
                    ->live()
                    ->minLength(10)
                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  RichEditor $component) {
                        $livewire->validateOnly($component->getStatePath());
                    }), 
                ComponentsBuilder::make('blocks')->blocks($schema)->collapsible(),  
                Forms\Components\Toggle::make('no_index')
                    ->required(),
                ])->columnSpan(3),
            Section::make()
                ->schema([
                    SEO::make(),
                ])->columnSpan(1),
            ])->columns(4);
    }

    public static function getEloquentQuery(): Builder
    {
        if (session('website')) {
            return static::getModel()::query()->where('site_id', session('website')->id);
        }
    
        // If session('website') is not set, you can return an empty query or handle the fallback behavior
        return static::getModel()::query(); // Or handle as needed
    }  


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('slug')
                ->sortable()
                ->searchable()
                ->toggleable(),
            Tables\Columns\IconColumn::make('no_index')
                ->sortable()
                ->searchable()
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('deleted_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            //
        ])
        ->actions([
            ActionGroup::make([
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
