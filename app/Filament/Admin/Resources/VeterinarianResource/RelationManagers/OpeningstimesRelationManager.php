<?php

namespace App\Filament\Admin\Resources\VeterinarianResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpeningstimesRelationManager extends RelationManager
{
    protected static string $relationship = 'openingstimes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('day_of_week')
                    ->options([
                        'Monday' => devTranslate('admin.Maandag', 'Maandag'), 
                        'Tuesday' => devTranslate('admin.Dinsdag', 'Dinsdag'),
                        'Wednesday' => devTranslate('admin.Woensdag', 'Woensdag'),
                        'Thursday' => devTranslate('admin.Donderdag', 'Donderdag'),
                        'Friday' => devTranslate('admin.Vrijdag', 'Vrijdag'),
                        'Saturday' => devTranslate('admin.Zaterdag', 'Zaterdag'),
                        'Sunday' => devTranslate('admin.Zondag', 'Zondag'),
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('day_of_week')
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week'),
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
