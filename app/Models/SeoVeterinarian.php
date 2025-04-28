<?php

namespace App\Models;

use App\Services\ContentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class SeoVeterinarian extends Model
{
    use HasFactory, HasSEO;

    protected $contentService;

    protected $table = 'seo_veterinarians';

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        // Instantiate the service
        $this->contentService = new ContentService();
    }

    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->generateDescription($this)), 120);
    }

    public static function incrementViewsIfHuman(self $vet): void
    {
        $userAgent = request()->userAgent();

        if (!$userAgent || self::isBot($userAgent)) {
            return;
        }

        $vet->increment('views');
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'region_id');
    }

    public function generateDescription(SeoVeterinarian $vet): string
    {
        $name = $vet->name;
        $city = optional($vet->city)->name ?? '';
        $province = optional($vet->province)->name ?? '';
        $website = $vet->website ? "Bezoek hun website voor meer informatie." : "";

        return "{$name} is gevestigd in {$city}, provincie {$province}. {$website}";
    }

    public static function getWithFeaturedImage($categoryId = null, $cityName = null, $search = null)
    {
        $lat = null;
        $lon = null;

        if ($cityName) {
            $city = City::where('name', 'like', '%' . $cityName . '%')->first();
            if ($city) {
                $lat = $city->lat;
                $lon = $city->lon;
            }
        }

        return self::query()
            ->with(['city'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });
            })
            ->when($lat && $lon, function ($query) use ($lat, $lon) {
                $query->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(lon) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) as distance", [
                    $lat, $lon, $lat
                ])->orderBy('distance');
            }, function ($query) {
                $query->orderByDesc('seo_veterinarians.id');
            })
            ->paginate(6);
    }

    public static function get3LatestVets()
    {
        return self::query()
            ->with(['city'])
            ->orderByDesc('seo_veterinarians.id')
            ->take(3)
            ->get();
    }

    public static function get3MostViewedVets()
    {
        return self::query()
            ->with(['city'])
            ->orderByDesc('views')
            ->take(3)
            ->get();
    }

    public static function get3BestRatedVets($limit = 3)
    {
        return self::query()
            ->with(['city'])
            ->orderByDesc('rating')
            ->take($limit)
            ->get();
    }

    public function importVeterinarians()
    {
        $provincies = Province::where('country', 'nl')->get();
        if (!empty($provincies)){
            foreach($provincies as $provincie){
                $veterinarians = (new Veterinarian())->get10VeterinariansPerProvince($provincie -> id);
                //here we make the insert 

                $command = "Kan je deze informatie herschrijven in een SEO-vriendelijke tekst? Zorg ervoor dat de tekst uniek is en niet lijkt op de originele tekst, ik wil in de tekst goede keywoorden, h2 h3 tags en het moet overzichtelijk en duidelijk zijn liefst minimaal 600 woorden, de tekst moet in html terug worden gegeven want het word opgeslagen in de database. Gebruik de volgende informatie: ";
        
        
                $command .= ' ' . $veterinarians -> html;
                $response = '';
        
                sleep(3);
                $response =  $this->contentService->createText($command);

                $seoVeterinarians = new SeoVeterinarian();
                $seoVeterinarians -> old_id = $veterinarians -> old_id;
                $seoVeterinarians -> name = $veterinarians -> name;
                $seoVeterinarians -> short_description = $veterinarians -> short_description ?? "";
                $seoVeterinarians -> description =  $response;
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

                //we import the reviews also
                $reviews = (new Review())->getReviews($veterinarians -> old_id);
                if (!empty($reviews)){
                    foreach($reviews as $review){

                        $command = "Kan je deze informatie herschrijven in een SEO-vriendelijke tekst? Zorg ervoor dat de tekst uniek is en niet lijkt op de originele tekst, ik wil in de tekst goede keywoorden. Gebruik de volgende informatie: ";
        
        
                        $command .= ' ' . $veterinarians -> html;
                        
                        $response2 = '';
                        sleep(2);
                        $response2 = $this->contentService->createText($command);

                        $seoReview                        = new SeoReview();
                        $seoReview -> name                = $review -> name;
                        $seoReview -> description         = $response2;
                        $seoReview -> rating              = $review -> rating;
                        $seoReview -> city                = $review -> city;
                        $seoReview -> created_at          = date('Y-m-d H:i:s');
                        $seoReview -> updated_at          = date('Y-m-d H:i:s');
                        $seoReview -> seo_veterinarian_id = $seoVeterinarians -> id;
                        $seoReview -> save();
                    }
                }


                die('We test first');
            }
        }
    }
}