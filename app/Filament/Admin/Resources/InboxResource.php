<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InboxResource\Pages;
use App\Filament\Admin\Resources\InboxResource\RelationManagers;
use App\Models\Inbox;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InboxResource extends Resource
{
    protected static ?string $model = Inbox::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup = 'Content management';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Message Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('messages')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('from_id')
                            ->options(
                                User::pluck('name', 'id')->toArray()
                            )
                            ->required(),
                        Select::make('to_id')
                            ->options(
                                User::pluck('name', 'id')->toArray()
                            )
                            ->required(),
                        Select::make('sender_id')
                            ->options(
                                User::pluck('name', 'id')->toArray()
                            )
                            ->required(),
                        Forms\Components\Toggle::make('read_by_sender')
                            ->required(),
                        Forms\Components\Toggle::make('read_by_receiver')
                            ->required(),
                        Forms\Components\Toggle::make('deleted_by_receiver')
                            ->required(),
                        Forms\Components\Toggle::make('deleted_by_sender')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('toUser.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sender.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('read_by_sender')
                    ->boolean(),
                Tables\Columns\IconColumn::make('read_by_receiver')
                    ->boolean(),
                Tables\Columns\IconColumn::make('deleted_by_receiver')
                    ->boolean(),
                Tables\Columns\IconColumn::make('deleted_by_sender')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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
            'index' => Pages\ListInboxes::route('/'),
            'create' => Pages\CreateInbox::route('/create'),
            'edit' => Pages\EditInbox::route('/{record}/edit'),
        ];
    }
}
