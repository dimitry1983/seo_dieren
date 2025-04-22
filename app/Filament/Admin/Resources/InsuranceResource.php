<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InsuranceResource\Pages;
use App\Filament\Admin\Resources\InsuranceResource\RelationManagers;
use App\Models\Insurance;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InsuranceResource extends Resource
{
    protected static ?string $model = Insurance::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';

    protected static ?string $navigationGroup = 'Content management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Insurances') // Title of the section
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('discount')
                            ->required(),
                        Forms\Components\Textarea::make('small_description')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('link')
                            ->maxLength(255)
                            ->url()
                            ->helperText('Enter a valid URL, e.g., https://example.com'),
                ]),
            ]);
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
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListInsurances::route('/'),
            'create' => Pages\CreateInsurance::route('/create'),
            'edit' => Pages\EditInsurance::route('/{record}/edit'),
        ];
    }
}
