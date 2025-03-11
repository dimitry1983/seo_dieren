<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VeterinarianPricingGroupResource\Pages;
use App\Filament\Admin\Resources\VeterinarianPricingGroupResource\RelationManagers;
use App\Models\VeterinarianPricingGroup;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinarianPricingGroupResource extends Resource
{
    protected static ?string $model = VeterinarianPricingGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Veterinarian management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Pricing Groups') // Title of the section
                ->schema([
                    
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                ]),
            ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
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
                //
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
            'index' => Pages\ListVeterinarianPricingGroups::route('/'),
            'create' => Pages\CreateVeterinarianPricingGroup::route('/create'),
            'edit' => Pages\EditVeterinarianPricingGroup::route('/{record}/edit'),
        ];
    }
}
