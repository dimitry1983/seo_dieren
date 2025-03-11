<?php

namespace App\Filament\Admin\Resources\VeterinarianResource\RelationManagers;

use App\Models\Veterinarian;
use App\Models\VeterinarianPricingGroup;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricingRelationManager extends RelationManager
{
    protected static string $relationship = 'pricing';

    public function form(Form $form): Form
    {
        return $form
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
