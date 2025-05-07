<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting as ModelsSetting;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;

class Settings extends Page
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';
    protected static string $view = 'filament.pages.setting';
    protected static ?int $navigationSort = 15;

    public $site_id;

    public $site_name, $site_description, $emailContact, $noindex, $adminmail;
    public $facebook, $twitter, $instagram;
    public $primary_color, $secondary_color;
    public $logo, $logo_primary, $logo_secondary;

    protected array $settingKeys = [
        'site_name', 'site_description', 'emailContact', 'noindex', 'adminmail',
        'facebook', 'twitter', 'instagram',
        'primary_color', 'secondary_color',
        'logo', 'logo_primary', 'logo_secondary',
    ];

    public function mount(): void
    {
        $this->site_id = session('website')->id;

        $settings = ModelsSetting::whereIn('option_name', $this->settingKeys)
            ->where('site_id', $this->site_id)
            ->get()
            ->keyBy('option_name');

        foreach ($this->settingKeys as $key) {
            $this->{$key} = $settings[$key]->option_value ?? null;
        }

        $this->form->fill($this->only($this->settingKeys));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('');
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Site Information')->schema([
                TextInput::make('site_name')->required(),
                Textarea::make('site_description'),
            ]),
            Section::make('Contact Page')->schema([
                TextInput::make('emailContact')->email(),
            ]),
            Section::make('Search Engine')->schema([
                Toggle::make('noindex'),
            ]),
            Section::make('Admin Email')->description('Email used for system notifications')->schema([
                TextInput::make('adminmail')->email(),
            ]),
            Section::make('Social Media')->schema([
                TextInput::make('facebook')->label('Facebook URL'),
                TextInput::make('twitter')->label('Twitter URL'),
                TextInput::make('instagram')->label('Instagram URL'),
            ]),
            Section::make('Brand Colors')->schema([
                ColorPicker::make('primary_color'),
                ColorPicker::make('secondary_color'),
            ]),
            Section::make('Logos')->schema([
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('settings/logos')
                    ->label('General Logo')
                    ->preserveFilenames(),

                FileUpload::make('logo_primary')
                    ->image()
                    ->disk('public')
                    ->directory('settings/logos')
                    ->label('Primary Logo')
                    ->preserveFilenames(),

                FileUpload::make('logo_secondary')
                    ->image()
                    ->disk('public')
                    ->directory('settings/logos')
                    ->label('Secondary Logo')
                    ->preserveFilenames(),
            ]),
        ];
    }

    public function submit()
    {
        foreach ($this->settingKeys as $key) {
            $value = $this->{$key};
    
            // ✅ Check for file upload and store it
            if (in_array($key, ['logo', 'logo_primary', 'logo_secondary'])) {
                if ($value instanceof \Livewire\TemporaryUploadedFile) {
                    $value = $value->store('settings/logos', 'public');
                } elseif (is_array($value)) {
                    $firstFile = reset($value);
               
                    if ($firstFile instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                        $value = $firstFile->store('settings/logos', 'public');
                    } else {
                        continue;
                    }
                } else {
                    continue;
                }
            }
    
            // ✅ Convert array values if needed (for multi-file support)
            // if (is_array($value)) {
            //     $value = $value[0] ?? null;
            // }
    
            // ✅ Store in DB
            ModelsSetting::updateOrCreate(
                ['option_name' => $key, 'site_id' => $this->site_id],
                ['option_value' => $value, 'autoload' => 1]
            );
        }
    
        Cache::forget('app_settings');
    
        Notification::make()
            ->title('Settings saved successfully!')
            ->success()
            ->send();
    }
}
