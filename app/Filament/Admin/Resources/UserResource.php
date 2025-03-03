<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Filament\Admin\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\Section;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'User management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(5) // 3 columns for details, 1 column for login details
                    ->schema([
                        // Left side - User details (3 columns)
                        Section::make('User Details')
                            ->schema([
                                Forms\Components\TextInput::make('first_name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('last_name')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('ip')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->live()
                                    ->minLength(2)
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  TextInput $component) {
                                        $livewire->validateOnly($component->getStatePath());
                                    }),  
                                Forms\Components\Select::make('role')
                                    ->required()
                                    ->options(['user' => 'user' , 'company' => 'company', 'admin' => 'admin'])
                                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  Select $component) {
                                        $livewire->validateOnly($component->getStatePath());
                                    })
                                ->default('user'),   
                                Forms\Components\Toggle::make('blocked')
                                    ->required(),
                                Forms\Components\Toggle::make('active')
                                    ->required(),
                                Forms\Components\Toggle::make('deleted')
                                    ->required(),
                            ])
                            ->columnSpan(3),
                        
                        // Right side - Login details (1 column)
                        Section::make('Login Details')
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->live()
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire,  TextInput $component) {
                                        $livewire->validateOnly($component->getStatePath());
                                    }),   
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DateTimePicker::make('email_verified_at'),   
                            ])
                            ->columnSpan(2),
                    ]),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('ip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('blocked')
                    ->boolean(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('deleted')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Action::make('Block User')
                        ->color('danger')
                        ->visible(fn (Model $record) => $record['blocked'] == 0)
                        ->hidden(fn (Model $record) => ($record['deleted'] == 1))
                        ->requiresConfirmation()
                        ->action(function (Model $record) {
                            $user = User::find($record ->id);
                            $user -> blocked = 1;
                            $user -> save();

                            $aData['success'] = "The user has been blocked successfully.";

                            Notification::make()->title($aData['success'])->success()->send();

                        })->icon('heroicon-o-no-symbol'),
                    Action::make('Delete')
                        ->color('danger')
                        ->visible(fn (Model $record) => $record['deleted'] == 0 && $record['blocked'] == 0)
                        ->requiresConfirmation()
                        ->form([
                            Textarea::make('reason')
                        ])
                        ->action(function (Model $record, array $data) {
                                $user = User::findOrFail($record -> id);
                                $email = $user->email;
                                $nickname = $user -> name;
                                if(empty($user)){
                                    $user = new User();
                                }
                                $user->active  = 0;
                                $user->blocked = 0;
                                $user->deleted = 1;
                                $user->save();

                                if (!empty($data['reason'])){
                                    Mail::send('mails.template',
                                        array(
                                            'subject' => __('Account declined'),
                                            'title'    => __('Dear ').$nickname.',',
                                            'content' => __('Your account have been declined for the following reason: ').$data['reason'],
                                            'showUnsubsribe'  => false,
                                            'button'  => false,
                                            'cancel'  => action('SiteController@unsubscribe') . '/?_token=' . Crypt::encrypt('user_id='. $user->id .'&user_role=' . $user->role)
                                        ), function($message) use ($user, $nickname , $email) {
                                            $message->from(config('mail.admin_email'), config('mail.app_name'));
                                            $message->to($email, env('APP_NAME'))->subject(__('Account declined'));
                                        });
                                }
                                $success = __('The record has been deleted.');
                                Notification::make()->title($success)->success()->send();

                            })->icon('heroicon-o-trash'),
                    Action::make('Undelete User')
                        ->color('success')
                        ->visible(fn (Model $record) => ($record['deleted'] == 1))
                        ->requiresConfirmation()
                        ->action(function (Model $record) {
                            $user = User::find($record -> id);

                            if(empty($user)){
                                $user = new User();
                            }

                            $user->active  = 0;
                            $user->blocked = 0;
                            $user->deleted = 0;
                            $user->save();

                            $success = __("This user has been succesfully undeleted.");

                            Notification::make()->title($success)->success()->send();

                        })->icon('heroicon-o-no-symbol'),
                    Action::make(__('Activate user'))
                        ->color('info')
                        ->requiresConfirmation()
                        ->visible(fn (Model $record) => ($record['active'] == 0 ||  $record['active'] == 2))
                        ->action(function (Model $record) {

                            $user = User::findOrFail($record -> id);

                            if (empty($user -> role)) {
                                Notification::make()->title(__('User doesnot have a role'))->error()->send();
                            }
                            else{
                                if(empty($user)){
                                    return false;
                                }
                                $nickname = $user -> name;
                                $user->active  = 1;
                                $user->blocked = 0;
                                $user->deleted = 0;
                                $user->save();

                                $token = Str::random(60);

                                // Save the token in the password_resets table
                                DB::table('password_reset_tokens')->insert([
                                    'email' => $user->email,
                                    'token' => Hash::make($token),
                                    'created_at' => now(),
                                ]);

                                // Prepare the email content
                                $nickname = $user->name;
                                $content = __('Your account has been approved. You can set your password <a href=":url">by clicking this link</a>.', [
                                    'url' => url('/reset-password', $token).'?newprofile=yes'
                                ]);

                                // Send the invitation email
                                Mail::send('mails.template', [
                                    'subject' => __("Your account has been approved."),
                                    'title' => __('Dear ') . $nickname . ',',
                                    'content' => $content,
                                    'showUnsubscribe' => false,
                                    'button' => true,
                                    'buttonurl' => url('/reset-password', [$token]).'?new-profile=yes',
                                    'buttontext' => __('Activate your account'),
                                    'cancel' => action('SiteController@unsubscribe') . '/?_token=' . Crypt::encrypt('user_id=' . $user->id . '&user_role=' . $user->role)
                                ], function ($message) use ($user) {
                                    $message->from(config('mail.admin_email'), config('mail.app_name'));
                                    $message->to($user->email, $user->name)->subject(__("Your account has been approved."));
                                });

                                $aData['success'] = "The record has been activated";
                                Notification::make()->title($aData['success'])->success()->send();
                            }

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
