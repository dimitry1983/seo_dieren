<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\SeoVeterinarian;
use App\Models\Veterinarian;
use App\Models\VeterinariansPricing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    //
    public function profile($slug, $id){
        // Fetch the veterinarian with all related data
        $veterinarian = SeoVeterinarian::with([
                            'featuredImage',
                            'images',
                            'pricing',
                            'openingstimes',
                            'services',
                            'categories',
                            'province',
                            'city'
                        ])
                        ->where('id', $id)
                        ->firstOrFail();

        // Check if the slug matches the veterinarian's name
        if ($slug !== slugify($veterinarian->name)) {
            abort(404); // Slug does not match, return 404
        }

        $reviews = $veterinarian->reviews()
        ->where('veterinarian_id', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
    
        // Calculate the average rating
        $rating = $reviews->avg('rating');
        
        // Prepare the rating counts (normalize to 5–1 stars)
        $rawCounts = $reviews->groupBy('rating')
            ->map(fn($group) => $group->count())
            ->toArray();
        
        $ratingCounts = collect([5, 4, 3, 2, 1])
            ->mapWithKeys(fn($star) => [$star => $rawCounts[$star] ?? 0])
            ->toArray();

        SeoVeterinarian::incrementViewsIfHuman($veterinarian);

        $seo['title'] = $veterinarian -> name;
        $seo['description'] = Str::limit(strip_tags($veterinarian -> description), 100, '...');
        $totalRatings = $this -> countReviews($id);

        $pricingGroup2 = VeterinariansPricing::where('pricing_group_id', 2)
                ->where('veterinarian_id', $id)
                ->get()
                ->groupBy('animal_name');

        $honden = $pricingGroup2['Hond (Teef)'] ?? collect();
        $katten = $pricingGroup2['Kat (Poes)'] ?? collect();
        $konijnen = $pricingGroup2['Konijn (Voedster)'] ?? collect();

        $groupOne = ['Castratie',
        'Preventieve zorg',
        'Consulten',
        'Bloed-, urine-, weefsel-, of ontlastingsonderzoek',
        'Opname',
        'Nagels knippen',
        'Chip plaatsen',
        'Oren spoelen',
        'Crematie'];

        return view('website.profile', ['honden' => $honden,  'groupOne' => $groupOne , 'katten' => $katten, 'konijnen' => $konijnen, 'seo' => $seo, 'veterinarian' => $veterinarian, 'rating' => $rating , 'totalRatings' => $totalRatings,'reviews' => $reviews, 'ratingCounts' => $ratingCounts]);
    }

    private function countReviews($id){
        return Review::where('veterinarian_id', $id)->count();
    }

}
