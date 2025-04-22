<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class SeoVeterinarian extends Model
{
    use HasFactory, HasSEO;

    protected $table = 'seo_veterinarians';

    protected $guarded = [];

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
}