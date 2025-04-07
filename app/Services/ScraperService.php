<?php
// app/Services/OutscraperService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ScraperService
{
    protected $apiKey;

    public function __construct()
    {

        $this->apiKey = env('OUTSCRAPER_API_KEY') ?? 'NTM2ODkzNjYzYjBjNDk0YmIwODJiNWQyYjU5ODg0Njh8MTE5YTFmNDJmYg';
    }

    public function fetchCompanyInfo(string $query, ?string $coordinates = null, int $limit = 1)
    {
        $url = 'https://api.app.outscraper.com/maps/search-v3';
    
        $params = [
            'query'           => $query,
            'limit'           => $limit,
            'async'           => false, // Note: Enrichments can slow down response times; consider setting async to true if needed.
            'dropDuplicates'  => true,
            // Including email and description along with other relevant fields
            'fields'          => 'name,email,description,domain,phone,site,full_address,location_link,rating,reviews_data,place_id,category',
            // Adding enrichments to enhance the returned data
            'enrichment'      => ['domains_service', 'emails_validator_service'],
        ];
    
        if ($coordinates) {
            $params['coordinates'] = $coordinates; // Format: "latitude,longitude" e.g., "52.3676,4.9041"
        }
    
        $response = Http::withHeaders([
            'X-API-KEY' => $this->apiKey,
        ])->get($url, $params);
    
        return $response->json();
    }


    public function fetchCompanyDetailsByPlaceId(string $placeId)
    {
        try {
            $url = 'https://api.app.outscraper.com/maps/reviews-v3';
        
            $params = [
                'query' => $placeId, // MUST be an array
                'limit' => 1,
                'reviewsLimit' => 10,
                'sort' => 'newest', // or 'most_relevant'
                'async' => false,
                'fields' => 'name,site,description,phone,full_address,rating,category,reviews_data,work_hours,about,posts',
            ];
        
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey,
                'Content-Type' => 'application/json',
            ])->get($url, $params);
            
            // Check if the response is successful
            if ($response->successful()) {
                return $response->json();
            } else {
                throw new \Exception('API request failed with status code ' . $response->status());
            }
        } catch (\Exception $e) {
            // Handle the error (log it or return a custom error response)
            return [
                'error' => 'An error occurred while fetching company details: ' . $e->getMessage(),
            ];
        }
    }
}