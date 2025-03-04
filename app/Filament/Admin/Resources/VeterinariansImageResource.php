<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VeterinariansImageResource\Pages;
use App\Filament\Admin\Resources\VeterinariansImageResource\RelationManagers;
use App\Models\Veterinarian;
use App\Models\VeterinariansImage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VeterinariansImageResource extends Resource
{
    protected static ?string $model = VeterinariansImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Veterinarian management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Images') // Title of the section
                    ->schema([
                        FileUpload::make('name')
                            ->image()
                            ->required()
                            ->directory('uploads') // Adjust the directory where images should be stored
                            ->maxSize(2048), // Max file size in KB (2MB)
                        
                        Toggle::make('featured')
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
                Tables\Columns\ImageColumn::make('name')
                    ->square() // Optional: Makes the image a square preview
                    ->circular() // Optional: Makes the image circular
                    ->size(50), // Adjust the image size in pixels
                Tables\Columns\IconColumn::make('featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('veterinarian.name')
                    ->sortable(),
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
            'index' => Pages\ListVeterinariansImages::route('/'),
            'create' => Pages\CreateVeterinariansImage::route('/create'),
            'edit' => Pages\EditVeterinariansImage::route('/{record}/edit'),
        ];
    }
}
