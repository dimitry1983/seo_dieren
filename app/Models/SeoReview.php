<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'parent_id',
        'name',
        'description',
        'rating',
        'city',
        'veterinarian_id',
        'site_id',
    ];

    public function scopeForSite($query)
    {
        return $query->where('site_id', session('website')->id);
    }

    public function veterinarian()
    {
        return $this->belongsTo(Veterinarian::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public static function getRandomReviews($limit = 2)
    {
        return self::with('veterinarian')
            ->where('parent_id', null)
            ->where('description', '!=', 'Niet aanwezig')
            ->inRandomOrder()
            ->take($limit)
            ->get();
    }
}