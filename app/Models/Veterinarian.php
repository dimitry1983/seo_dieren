<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Veterinarian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getExcerptAttribute(): string
    {
        return Str::limit(strip_tags($this->generateDescription($this)), 120);
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

    public static function getWithFeaturedImage($categoryId = null)
    {
        return self::query()
            ->with('featuredImage')
            ->when($categoryId, function ($query) use ($categoryId) {
                
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                });
            })
            ->orderByDesc('veterinarians.id')
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
}
