<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VeterinarianResource\Pages;
use App\Filament\Admin\Resources\VeterinarianResource\RelationManagers;
use App\Models\City;
use App\Models\Province;
use App\Models\Veterinarian;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinarianResource extends Resource
{
    protected static ?string $model = Veterinarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Veterinarian management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(5) // 3 columns for general info, 2 columns for contact info
                    ->schema([
                        // Left side - General info (3 columns)
                        Section::make('General Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('short_description')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('lat')
                                    ->numeric(),
                                Forms\Components\TextInput::make('lon')
                                    ->numeric(),
                                Forms\Components\TextInput::make('user_id')
                                    ->required()
                                    ->numeric()
                                    ->default(1),
                            ])
                            ->columnSpan(3),
    
                        // Right side - Contact info (2 columns)
                        Section::make('Contact Information')
                            ->schema([
                                Forms\Components\Select::make('region_id')
                                    ->label('Province')
                                    ->searchable(true)
                                    ->options(function (Get $get){
                                        $countryId = 1;
                
                                        if (!empty($countryId)){
                                            return Province::getStateByCountry($countryId);
                                        }
                                    })
                                    ->live()
                                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  Forms\Components\Select $component) {
                                        $livewire->validateOnly($component->getStatePath());
                                    }),
                                Forms\Components\TextInput::make('city_id')
                                        ->label('City')
                                        ->searchable(true)
                                        ->live()
                                        ->options(function (Get $get){
                                            $countryId = 1;
                                            $stateId = $get('province_id');
                    
                                            if (!empty($countryId) && !empty($stateId)){
                                                return City::getCityByCountryAndState($countryId, $stateId);
                                            }
                                        })
                                        ->required()
                                        ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  Forms\Components\Select $component) {
                                            $livewire->validateOnly($component->getStatePath());
                                        }),
            
                                Forms\Components\TextInput::make('zipcode')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('street')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('street_nr')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('website')
                                    ->maxLength(255),
                            ])
                            ->columnSpan(2),
                    ]),
            ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('zipcode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('street')
                    ->searchable(),
                Tables\Columns\TextColumn::make('street_nr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
            'index' => Pages\ListVeterinarians::route('/'),
            'create' => Pages\CreateVeterinarian::route('/create'),
            'edit' => Pages\EditVeterinarian::route('/{record}/edit'),
        ];
    }
}
