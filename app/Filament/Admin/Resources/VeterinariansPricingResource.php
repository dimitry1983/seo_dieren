<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VeterinariansPricingResource\Pages;
use App\Filament\Admin\Resources\VeterinariansPricingResource\RelationManagers;
use App\Models\Veterinarian;
use App\Models\VeterinarianPricingGroup;
use App\Models\VeterinariansPricing;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinariansPricingResource extends Resource
{
    protected static ?string $model = VeterinariansPricing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Veterinarian management';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Pricing') // Title of the section
                ->schema([
                    Forms\Components\Select::make('pricing_group_id')
                        ->options(VeterinarianPricingGroup::pluck('name', 'id'))
                        ->required(),
                    TextInput::make('name')
                            ->required(), // Max file size in KB (2MB)
                    TextInput::make('consult_price')
                            ->required(),
                    Select::make('veterinarian_id')
                        ->searchable()
                        ->label('Veterinarian')
                        ->options(Veterinarian::pluck('name', 'id')->toArray())    
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('consult_price')
                    ->label('Price')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('veterinarian.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListVeterinariansPricings::route('/'),
            'create' => Pages\CreateVeterinariansPricing::route('/create'),
            'edit' => Pages\EditVeterinariansPricing::route('/{record}/edit'),
        ];
    }
}
