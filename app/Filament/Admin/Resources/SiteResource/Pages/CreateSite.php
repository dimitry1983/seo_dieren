<?php

namespace App\Filament\Admin\Resources\SiteResource\Pages;

use App\Filament\Admin\Resources\SiteResource;
use App\Models\Category;
use App\Models\Navigation;
use App\Models\Page;
use App\Models\Province;
use App\Models\SeoVeterinarian;
use App\Models\Site;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSite extends CreateRecord
{
    protected static string $resource = SiteResource::class;

    protected function afterCreate(): void
    {
        $lastSite = Site::latest()->first();
        set_time_limit(0);
         ini_set('max_execution_time', 0);
        //insert pages
        $pages = Page::where('site_id', 0)->get();
        foreach ($pages as $page) {
            // Create a new page record with the same attributes, except for site_id
            $newPage = $page->replicate(); // Replicate the existing page
            $newPage->site_id = $lastSite -> id; // Assign the new site_id
            $newPage->save(); // Save the new duplicated page
        }
        $navigations = Navigation::where('site_id', 0)->get();
        foreach ($navigations as $navigation) {
            // Create a new navigation record with the same attributes, except for site_id
            $newNavigation = $navigation->replicate(); // Replicate the existing page
            $newNavigation->site_id = $lastSite -> id; // Assign the new site_id
            $newNavigation->save(); // Save the new duplicated page
        }
   
    
        //rewrite this description and make the content longer and seooptimized, using h2 h3 tags and return in html so i can insert the html into the database.

        // Runs after the form fields are saved to the database.
    }
}
