<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Veterinarian extends Model
{
    use HasFactory, HasSEO;

    protected $guarded = [];

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->generateDescription($this)), 120);
    }

    public static function incrementViewsIfHuman(self $veterinarian): void
    {
        $userAgent = request()->userAgent();

        if (!$userAgent || self::isBot($userAgent)) {
            return;
        }

        $veterinarian->increment('views');
    }

    protected static function isBot(string $userAgent): bool
    {
        $bots = [
            'bot', 'crawl', 'slurp', 'spider', 'mediapartners', 
            'facebookexternalhit', 'google', 'bingpreview', 
            'yandex', 'baidu', 'duckduckbot'
        ];

        $userAgent = strtolower($userAgent);

        foreach ($bots as $bot) {
            if (str_contains($userAgent, $bot)) {
                return true;
            }
        }

        return false;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Remove categories and services from $data to avoid mass assignment errors
        $categories = $data['categories'] ?? [];
        unset($data['categories']);
    
        $services = $data['services'] ?? [];
        unset($data['services']);
    
        return $data;
    }
    
    protected function afterSave(Veterinarian $record, array $data): void
    {
        // Sync the categories relationship if provided
        if (isset($data['categories'])) {
            $record->categories()->sync($data['categories']);
        }
        
        // Sync the services relationship if provided
        if (isset($data['services'])) {
            $record->services()->sync($data['services']);
        }
    }

    /**
     * Get the user (admin) that owns the veterinarian.
    */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

        /**
     * Get the city associated with the veterinarian.
     */
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }

    /**
     * Get the province (region) associated with the veterinarian.
     */
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'region_id');
    }

    /**
     * The categories that belong to the veterinarian.
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class, 'veterinarians_categories', 'veterinarian_id', 'category_id');
    }

    /**
     * The services that belong to the veterinarian.
     */
    public function services()
    {
        return $this->belongsToMany(\App\Models\Service::class, 'veterinarians_services', 'veterinarian_id', 'category_id');
    }

    /**
     * The reviews that belong to the veterinarian.
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'veterinarian_id', 'id');
    }

    /**
     * The openingstimes that belong to the veterinarian.
     */
    public function openingstimes()
    {
        return $this->hasMany(VegetarianOpeningTime::class, 'veterinarian_id', 'id');
    }

    /**
     * The openingstimes that belong to the veterinarian.
     */
    public function images()
    {
        return $this->hasMany(VeterinariansImage::class, 'veterinarian_id', 'id');
    }

    /**
     * The openingstimes that belong to the veterinarian.
     */
    public function pricing()
    {
        return $this->hasMany(VeterinariansPricing::class, 'veterinarian_id', 'id');
    }

    /**
     * Relationship with the Veterinarian model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    // All images
    public function veterinariansImages()
    {
        return $this->hasMany(VeterinariansImage::class);
    }

    // Only the featured image
    public function featuredImage()
    {
        return $this->hasOne(VeterinariansImage::class)->where('featured', 1);
    }


    public static function getWithFeaturedImage($categoryId = null, $cityName = null, $search = null)
    {
        $lat = null;
        $lon = null;
    
        // Fetch lat/lon from the city if a city name is provided
        if ($cityName) {
            $city = \App\Models\City::where('name', 'like', '%' . $cityName . '%')->first();
            if ($city) {
                $lat = $city->lat;
                $lon = $city->lon;
            }
        }
    
        return self::query()
            ->with(['featuredImage', 'city'])
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                });
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->when($lat && $lon, function ($query) use ($lat, $lon) {
                // Add distance calculation using the Haversine formula
                $query->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lon) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) as distance", [
                    $lat, $lon, $lat
                ])->orderBy('distance');
            }, function ($query) {
                $query->orderByDesc('veterinarians.id');
            })
            ->paginate(6);
    }

    public function generateDescription(Veterinarian $vet): string
    {
        $name = $vet->name;
        $city = optional($vet->city)->name ?? '';
        $province = optional($vet->province)->name ?? '';
        $services = $vet->services->pluck('name')->implode(', ');
        $openings = $vet->openingstimes->count() ? "Bekijk de openingstijden voor meer informatie." : "";
        $website = $vet->website ? "Bezoek hun website voor meer informatie." : "";

        // Categorieteksten
        $categoryTexts = [
            'Honden' => 'gespecialiseerd in de zorg voor honden',
            'Katten' => 'gespecialiseerd in de zorg voor katten',
            'Overige' => 'beschikt over expertise voor diverse diersoorten',
            'Asielen' => 'biedt opvang en herplaatsing van dieren',
            'Specialisten' => 'beschikt over gespecialiseerde kennis voor complexe behandelingen',
            'Noodgevallen' => 'biedt 24/7 hulp bij spoedgevallen'
        ];

        $foundCategories = $vet->categories->pluck('name')->filter()->toArray();
        $descriptions = [];

        foreach ($foundCategories as $cat) {
            if (isset($categoryTexts[$cat])) {
                $descriptions[] = $categoryTexts[$cat];
            }
        }

        $categorySentence = '';
        if (count($descriptions)) {
            $categorySentence = 'Deze praktijk is ' . implode(', ', array_slice($descriptions, 0, -1));
            if (count($descriptions) > 1) {
                $categorySentence .= ' en ' . end($descriptions);
            } else {
                $categorySentence = 'Deze praktijk is ' . $descriptions[0];
            }
            $categorySentence .= '.';
        }

        return "{$name} is gevestigd in {$city}, provincie {$province}. {$categorySentence} Ze bieden diensten aan zoals {$services}. {$openings} {$website}";
    }

    public static function get3latestVets(){
        return self::query()
            ->with(['featuredImage', 'city'])
            ->orderByDesc('veterinarians.id')
            ->take(3)
            ->get();
    }

    public static function get3BestRatedVets($limit = 3){
        return self::query()
            ->with(['featuredImage', 'city'])
            ->withAvg('reviews', 'rating')
            ->orderByDesc('rating')
            ->take($limit)
            ->get();
    }

    public static function get3MostViewedVets(){
        return self::query()
            ->with(['featuredImage', 'city'])
            ->orderByDesc('views')
            ->take(3)
            ->get();
    }

    public function get10VeterinariansPerProvince($provinceId)
    {
        // Get a random city from the province
        $city = City::where('province_id', $provinceId)->inRandomOrder()->first();
    
        if (!$city) {
            return []; // Return empty if no city is found
        }
    
        $lat = $city->lat;
        $lon = $city->lon;
    
        // Get the 10 closest veterinarians based on the Haversine formula
        $veterinarians = Veterinarian::selectRaw(
                "*, 
                ( 6371 * acos( cos( radians(?) ) * cos( radians(lat) ) * cos( radians(lon) - radians(?) ) + sin( radians(?) ) * sin( radians(lat) ) ) ) AS distance",
                [$lat, $lon, $lat]
            )
            ->having('distance', '<', 75) // Optional, set maximum distance (50 km in this case)
            ->orderBy('distance')
            ->limit(10)
            ->get();
    
        return $veterinarians;
    }


    public static function importVeterinarians($data)
    {
        $provincies = Province::where('country', 'nl')->get();
        if (!empty($provincies)){
            foreach($provincies as $provincie){
                $veterinarians = self::get10VeterinariansPerProvince($provincie -> id);
                //here we make the insert 

                $command4 = "
                Services 
        
                Ons systeem heeft de volgende services
                1. Vaccins
                2. Accessoires
                3. Consultaties
                4. Ontwormen
                5. Operaties
                6. Spoedgevallen
                7. Verkoop van medicijnen
                8. Voedingsadvies
        
                Geef in een json string (Services) aan , separated welke id's van de services bij dit bedrijf van toepassing zijn  
                Bijvoorbeeld: 1,2,4,6 , wanneer geen resultaat selecteer alle services
        
                Categorieen 
        
                Ons systeem heeft de volgende services
                1. Honden
                2. Katten
                3. Overige
                4. Asielen
                5. Specialisten
                6. Noodgevallen
        
                Geef deze in een json string (Categorie) aan , separated welke id's van de services bij dit bedrijf van toepassing zijn 
                Bijvoorbeeld: 1,2,4,6 , wanneer geen resultaat selecteer alle Categorieen
        
                Openingstijden
                day_of_week (int)
                open_time (time)
                close_time (time)
                is_closed (int)
                notes (text)
        
                ik heb iedere dag van de week nodig!
        
                Geef dit terug in a json string Openingstijden  dus response['Openingstijden'] (array) + response['Services'] (string , seperated) + response['Categorie']  (string , seperated), met hun attributen
            ";
        
        
                $command .= ' ' . $command4;
                
        
                sleep(3);
                $response = $this->generateResponseWithOpenAI($command);



                $seoVeterinarians = new SeoVeterinarian();
                $seoVeterinarians -> old_id = $veterinarians -> old_id;
                $seoVeterinarians -> name = $veterinarians -> name;
                $seoVeterinarians -> short_description = $veterinarians -> short_description ?? "";
                $seoVeterinarians -> description = $veterinarians -> description;
                $seoVeterinarians -> region_id = $veterinarians -> region_id;
                $seoVeterinarians -> city_id = $veterinarians -> city_id;
                $seoVeterinarians -> zipcode = $veterinarians -> zipcode;
                $seoVeterinarians -> street = $veterinarians -> street;
                $seoVeterinarians -> street_nr = $veterinarians -> street_nr;
                $seoVeterinarians -> phone = $veterinarians -> phone;
                $seoVeterinarians -> website = $veterinarians -> website;
                $seoVeterinarians -> location_link = $veterinarians -> location_link;
                $seoVeterinarians -> views = $veterinarians -> views;
                $seoVeterinarians -> place_id = $veterinarians -> place_id;
                $seoVeterinarians -> lat = $veterinarians -> lat;
                $seoVeterinarians -> lon = $veterinarians -> lon;
                $seoVeterinarians -> user_id = $veterinarians -> user_id;
                $seoVeterinarians -> site_id = $veterinarians -> site_id;
                $seoVeterinarians -> created_at = date('Y-m-d H:i:s');
                $seoVeterinarians -> updated_at = date('Y-m-d H:i:s');
                $seoVeterinarians -> save();
            }
        }
    }


}
