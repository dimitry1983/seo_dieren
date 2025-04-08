<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile($slug, $id){
        // Fetch the veterinarian with all related data
        $veterinarian = Veterinarian::with([
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


        return view('website.profile', ['veterinarian' => $veterinarian]);
    }

}
