<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ClaimResource\Pages;
use App\Filament\Admin\Resources\ClaimResource\RelationManagers;
use App\Models\Claim;
use App\Models\User;
use App\Models\Veterinarian;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ClaimResource extends Resource
{
    protected static ?string $model = Claim::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $navigationGroup = 'Content management';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Claims') // Title of the section
                    ->schema([
                        Forms\Components\Select::make('veterinarian_id')
                            ->label('Veterinarian')
                            ->options(
                                Veterinarian::pluck('name', 'id')->toArray()
                            )
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('details')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('status')
                            ->options(
                                [
                                    'pending' => 'Pending',
                                    'approved' => 'Approved',
                                    'rejected' => 'Rejected',
                                ]
                            )    
                            ->required(),
                        ]),
            ]);    
        }

    //@todo a custom method needs to be added for approval and rejection of claims + we need tabs for the different types of claims    
    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('veterinarian.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('veterinarian.website')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status')
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
                    Action::make('Claim afwijzen')
                    ->color('danger')
                    //->hidden(fn (Model $record) => ($record['deleted'] == 1 || $record['deactivated'] == 1))
                    ->visible(fn (Model $record) => ($record['active'] == 0 ||  $record['active'] == 2) && $record['deleted'] == 0 && $record['blocked'] == 0)
                    ->requiresConfirmation()
                    ->form([
                        Textarea::make('reason')->required(),
                    ])
                    ->action(function (Model $record, array $data) {
               
                        $claim = Claim::where('email', $record->email)->where('status', 'rejected')->first();     
                        $user = User::where('email', $record->email)->first();  
                        if(empty($claim)){
                            $claim -> delete();
                            $user ->delete();
                        }
                        $nickname = $user -> name;
                        $content = $data['reason'];
                        Mail::send('mails.template',
                            array(
                                'subject' => __('Je claim op vergelijkdierenartst.nl is afgewezen'),
                                'title'    => __('Geachte ').$nickname.',',
                                'content' => $content,
                                'showUnsubsribe'  => false,
                                'button'  => false,
                                'cancel'  => action('SiteController@unsubscribe') . '/?_token=' . Crypt::encrypt('user_id='. $user->id .'&user_role=' . $user->role)
                            ), function($message) use ($user) {
                                $message->from(config('mail.admin_email'), config('mail.app_name'));
                                $message->to($user->email, getName($user))->subject(trans('Jouw claim is afgewezen'));
                            });
                        $aData['success'] = "Jouw claim is afgewezen";
                        Notification::make()->title($aData['danger'])->error()->send();

                        })->icon('heroicon-o-pencil-square'),


                Action::make(__('Claim goedkeuren'))
                    ->color('info')
                    ->requiresConfirmation()
                    ->action(function (Model $record) {
                        
                        $claim = Claim::where('email', $record->email)->where('status', 'pending')->first();     
                        $user = User::where('email', $record->email)->first();  
                        if(empty($claim)){
                            $claim -> delete();

                            $veterinarians = new Veterinarian();
                            $veterinarians -> user_id = $user -> id;
                            $veterinarians -> save();
                        }
                     
                        $content = __('Je claim is goedgekeurd op vergelijkdierenarst.nl. Je kunt inloggen via<a href=":url">url van onze login pagina</a>.',['url' => route('login')]);
                        Mail::send('mails.template',
                            array(
                                'subject' => __('We hebben je claim goedgekeurd op vergelijkdierenarst.nl'),
                                'title'    => __('Geachte heer / mevrouw').',',
                                'content' => $content,
                                'showUnsubsribe'  => false,
                                'button' => true,
                                'buttonurl' => route('login'),
                                'buttontext' => __('Login to your account'),
                                'cancel'  => action('SiteController@unsubscribe') . '/?_token=' . Crypt::encrypt('user_id='. $user->id .'&user_role=' . $user->role)
                            ), function($message) use ($user) {
                                $message->from(config('mail.admin_email'), config('mail.app_name'));
                                $message->to($user->email, getName($user))->subject(trans('Account has been succesfully activated'));
                            });
                        
                        $aData['success'] = "The record has been activated";
                        Notification::make()->title($aData['success'])->success()->send();
                        
                                                        
                    })->icon('heroicon-o-bars-arrow-up')->openUrlInNewTab()  
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
            'index' => Pages\ListClaims::route('/'),
            'create' => Pages\CreateClaim::route('/create'),
            'edit' => Pages\EditClaim::route('/{record}/edit'),
        ];
    }
}
