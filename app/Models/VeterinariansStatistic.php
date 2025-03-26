<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VeterinariansStatistic extends Model
{
    //VeterinariansStatistic::addView($veterinarianId);
    protected $table = 'veterinarians_statistics';

    protected $fillable = ['veterinarian_id', 'views'];

    /**
     * Add a view for the given veterinarian ID.
     * It checks if the visitor is not a bot before incrementing.
     *
     * @param int $veterinarianId
     * @return void
     */
    public static function addView($veterinarianId)
    {
        if (self::isBot()) {
            return;
        }

        $statistics = self::firstOrCreate(
            [
                'veterinarian_id' => $veterinarianId,
                'created_at' => now()->startOfDay()
            ],
            ['views' => 0]
        );

        $statistics->increment('views');
    }

    /**
     * Check if the current request is from a bot.
     *
     * @return bool
     */
    private static function isBot()
    {
        $userAgent = strtolower(request()->userAgent());

        $botKeywords = [
            'bot', 'crawl', 'slurp', 'spider', 'mediapartners', 
            'pingdom', 'crawler', 'facebookexternalhit', 'twitterbot', 
            'bingpreview', 'yandex', 'ia_archiver'
        ];

        foreach ($botKeywords as $keyword) {
            if (strpos($userAgent, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }
}
