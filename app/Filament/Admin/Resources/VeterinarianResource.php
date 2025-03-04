<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VeterinarianResource\Pages;
use App\Filament\Admin\Resources\VeterinarianResource\RelationManagers;
use App\Models\Category;
use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\Veterinarian;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinarianResource extends Resource
{
    protected static ?string $model = Veterinarian::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

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
                                Select::make('categories')
                                    ->label('Categories')
                                    ->multiple()
                                    ->relationship('categories', 'name') // Ensure this matches the model function
                                    ->searchable()
                                    ->preload(), 
                                Forms\Components\RichEditor::make('description')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('lat')
                                    ->readOnly()
                                    ->numeric(),
                                Forms\Components\TextInput::make('lon')
                                    ->readOnly()
                                    ->numeric(),
                                Select::make('user_id')
                                    ->searchable()
                                    ->getSearchResultsUsing(
                                        fn (string $search): array => User::where('name', 'like', "%{$search}%")
                                            ->limit(50)
                                            ->get()
                                            // This produces an array like [1 => 'Alice', 2 => 'Bob', ...]
                                            ->pluck('name', 'id')
                                            ->toArray()
                                    )
                                    ->getOptionLabelUsing(fn ($value) => User::find($value)?->name)
                                    ->placeholder('Select a user')
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
                                Forms\Components\Select::make('city_id')
                                        ->label('City')
                                        ->searchable(true)
                                        ->live()
                                        ->options(function (Get $get){
                                            $countryId = 1;
                                            $stateId = $get('region_id');
                    
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
                                    ->maxLength(255)
                                    ->type('url') // Optional: sets the HTML input type to "url"
                                    ->rules(['url']) // Ensures Laravel validates it as a URL
                                    ->placeholder('https://example.com')
                            ])
                            ->columnSpan(2),
                    ]),
            ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('province.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('zipcode')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('street')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('street_nr')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('lat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lon')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListVeterinarians::route('/'),
            'create' => Pages\CreateVeterinarian::route('/create'),
            'edit' => Pages\EditVeterinarian::route('/{record}/edit'),
        ];
    }
}
