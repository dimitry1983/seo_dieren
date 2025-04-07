<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VegetarianOpeningTimeResource\Pages;
use App\Filament\Admin\Resources\VegetarianOpeningTimeResource\RelationManagers;
use App\Models\VegetarianOpeningTime;
use App\Models\Veterinarian;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VegetarianOpeningTimeResource extends Resource
{
    protected static ?string $model = VegetarianOpeningTime::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Veterinarian management';

    protected static ?int $navigationSort = 4;

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Opening Hours')
                    ->schema([
                        Select::make('day_of_week')
                            ->options([
                                '1' => devTranslate('admin.Maandag', 'Maandag'), 
                                '2' => devTranslate('admin.Dinsdag', 'Dinsdag'),
                                '3' => devTranslate('admin.Woensdag', 'Woensdag'),
                                '4' => devTranslate('admin.Donderdag', 'Donderdag'),
                                '5' => devTranslate('admin.Vrijdag', 'Vrijdag'),
                                '6' => devTranslate('admin.Zaterdag', 'Zaterdag'),
                                '0' => devTranslate('admin.Zondag', 'Zondag'),
                            ])
                            ->required(),
                        TimePicker::make('open_time')
                            ->label('Opening Time')
                            ->required()
                            ->displayFormat('HH:mm') // 24-hour format
                            ->seconds(false), // Hides seconds (optional)     
                        TimePicker::make('close_time')
                            ->label('Closing Time')
                            ->required()
                            ->displayFormat('HH:mm') // 24-hour format
                            ->seconds(false),
                        Toggle::make('is_closed')
                            ->label('Closed for the day')
                            ->required(),
                        Textarea::make('notes')
                            ->label('Additional Notes')
                            ->columnSpanFull(),
                        Select::make('veterinarian_id')
                            ->searchable()
                            ->label('Veterinarian')
                            ->options(Veterinarian::pluck('name', 'id')->toArray())    
                            ->required(),
                    ])
                    ->columnSpanFull(), // Ensures the section spans full width
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week')
                        ->searchable()
                        ->sortable()
                        ->toggleable(),
                Tables\Columns\TextColumn::make('open_time')
                        ->searchable()
                        ->sortable()
                        ->toggleable(),
                Tables\Columns\TextColumn::make('close_time')
                        ->searchable()
                        ->sortable()
                        ->toggleable(),
                Tables\Columns\IconColumn::make('is_closed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('veterinarian.name')
                    ->searchable()
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
            'index' => Pages\ListVegetarianOpeningTimes::route('/'),
            'create' => Pages\CreateVegetarianOpeningTime::route('/create'),
            'edit' => Pages\EditVegetarianOpeningTime::route('/{record}/edit'),
        ];
    }
}
