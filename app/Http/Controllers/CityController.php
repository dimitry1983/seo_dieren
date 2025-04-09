<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function search(Request $request)
    {
       
        $query = $request->input('q');

        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }

        $cities = DB::table('cities')
            ->where('country_id', 1)
            ->where('name', 'like', '%' . $query . '%')
            ->limit(10)
            ->get(['name']);

        return response()->json($cities);
    }
}