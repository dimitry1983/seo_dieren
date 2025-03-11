<?php

namespace App\Filament\Admin\Resources\VeterinarianResource\RelationManagers;

use App\Models\Veterinarian;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    public function form(Form $form): Form
    {
        return $form
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('name')
                    ->square() // Optional: Makes the image a square preview
                    ->circular() // Optional: Makes the image circular
                    ->size(50),
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
