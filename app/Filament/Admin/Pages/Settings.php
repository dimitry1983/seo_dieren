<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting as ModelsSetting;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.pages.setting';

    protected static ?int $navigationSort = 15;

    public $settings, $site_name, $noindex, $adminmail, $emailContact, $site_description, $facebook, $twitter, $instagram, $site_id;

    protected $rules = [
        'site_name',
        'site_description'
    ];

    public function mount()
    {
        $this->site_id = session('website')->id;

        $settings = ['site_name', 'site_description', 'emailContact', 'noindex', 'adminmail', 'facebook', 'twitter', 'instagram'];

        $this->settings = $settings;

        // Fetch settings based on site_id
        $settings = ModelsSetting::whereIn('option_name', $settings)
            ->where('site_id', $this->site_id)
            ->get();

        foreach ($settings as $setting) {
            $propertyName = $setting->option_name;

            if (property_exists($this, $propertyName)) {
                $this->{$propertyName} = $setting->option_value;
            }
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Site Information')
            ->schema([
                TextInput::make('site_name'),
                Textarea::make('site_description'),
            ]),
            Section::make('Contact Page')
            ->schema([
                TextInput::make('emailContact'),
            ]),
            Section::make('Search engine')
            ->schema([
                Toggle::make('noindex'),
            ]),
            Section::make('Admin email')
            ->description('Email address for sending site mails')
            ->schema([
                TextInput::make('adminmail'),
            ]),
            Section::make('Social')
            ->schema([
                TextInput::make('facebook'),
                TextInput::make('twitter'),
                TextInput::make('instagram')
            ]),
        ];
    }

    public function submit()
    {
        if (!empty($this->settings)) {
            foreach ($this->settings as $option_name) {
                $attributes = ['option_name' => $option_name, 'site_id' => $this->site_id]; // Include site_id here
                $values = ['option_value' => $this->{$option_name}, 'autoload' => 1];

                ModelsSetting::updateOrCreate($attributes, $values);
                Cache::forget('app_settings');
            }

            Notification::make()
                ->title('Saved')
                ->success()
                ->send();
        }
    }
}