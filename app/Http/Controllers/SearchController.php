<?php

namespace App\Http\Controllers;

use App\Models\Veterinarian;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        //not in use !important handled in sitecontroller
        $bestVets       = Veterinarian::get3BestRatedVets();
        $mostViewedVets = Veterinarian::get3MostViewedVets();


        return view('website.search', [
            'bestVets' => $bestVets,
            'mostViewedVets' => $mostViewedVets
        ]);
    }
}
