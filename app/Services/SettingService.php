<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function get(string $optionName)
    {
        return Setting::where('option_name', $optionName)->where('site_id', session('website')->id)->value('option_value');
    }

    public function getAutoloadSettings()
    {
        return Setting::where('autoload', true)->where('site_id', session('website')->id)->pluck('option_value', 'option_name');
    }
}

// usage example
// use App\Services\SettingService;

// class ExampleController extends Controller
// {
//     protected $settingService;

//     public function __construct(SettingService $settingService)
//     {
//         $this->settingService = $settingService;
//     }

//     public function example()
//     {
//         $value = $this->settingService->get('site_name');
//         $this->settingService->set('site_name', 'My Website');
//         return response()->json(['site_name' => $value]);
//     }
// }