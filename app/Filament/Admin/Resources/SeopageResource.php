<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SeopageResource\Pages;
use App\Filament\Admin\Resources\SeopageResource\RelationManagers;
use App\Models\Page;
use App\Models\Seopage;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeopageResource extends Resource
{
    protected static ?string $model = Seopage::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationGroup = 'Content management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make()
            ->schema([
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_page')
                    ->disabled()
                    ->numeric(),
                Forms\Components\TextInput::make('custom_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('meta_description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('top_description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('bottom_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\TextInput::make('site_id')
                    ->disabled()
                    ->required()
                    ->numeric()
                ])->columnSpan(4),
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
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent Page')
                    ->sortable(),
                Tables\Columns\TextColumn::make('custom_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->html()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('site_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('parent_page')
                ->form([
                    Select::make('parent_page')
                        ->searchable()
                        ->getSearchResultsUsing(fn(string $search): array => Page::where('site_id',  session('website')->id)
                            ->limit(50)->pluck('title', 'id')->toArray())
                ])
                ->query(function (Builder $query, array $data): Builder {
                    $id = $data['parent_page'];
                    return $query
                        ->when(
                            $id ?? [],
                            fn(Builder $query, $id): Builder => $query->where('parent_page', '=', $id),
                        );
                })->indicateUsing(function (array $data): ?string {
                    return $data['parent_page'];
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSeopages::route('/'),
            //'create' => Pages\CreateSeopage::route('/create'),
            'edit' => Pages\EditSeopage::route('/{record}/edit'),
        ];
    }
}
