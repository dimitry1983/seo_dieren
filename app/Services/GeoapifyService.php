<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeoapifyService
{
    protected $apiKey;

    public function __construct()
    {
        // It is recommended to store your API key in your .env file and access it via config/services.php.
        // For example, add 'geoapify' => ['key' => env('GEOAPIFY_API_KEY')], in config/services.php.
        $this->apiKey = config('services.geoapify.key', '2421c6f9a696458a99ef8c659a457729');
    }

    /**
     * Public method to get coordinates based on address parameters.
     *
     * @param string $address  e.g. "38 Upper Montagu Street"
     * @param string $city     e.g. "Westminster"
     * @param string $postcode Optional, e.g. "W1H 1LJ"
     * @param string $country  Default "United Kingdom"
     * @return array
     * @throws \Exception
     */
    public function getCoordinates(string $address, string $city, string $postcode = '', string $country = 'Netherlands'): array
    {
        return $this->_getLatLon($address, $city, $postcode, $country);
    }

    /**
     * Private function to call the Geoapify API and extract lat, lon.
     *
     * @param string $address
     * @param string $city
     * @param string $postcode
     * @param string $country
     * @return array
     * @throws \Exception
     */
    private function _getLatLon(string $address, string $city, string $postcode, string $country): array
    {
        // Build the full address string dynamically
        $queryParts = [$address, $city];
        if (!empty($postcode)) {
            $queryParts[] = $postcode;
        }
        $queryParts[] = $country;
        $fullAddress = implode(', ', $queryParts);
      
        $url = "https://api.geoapify.com/v1/geocode/search?text=" . urlencode($fullAddress) . "&apiKey=" . $this->apiKey;

        
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            if (!empty($data['features']) && count($data['features']) > 0) {
                $lat = $data['features'][0]['properties']['lat'] ?? null;
                $lon = $data['features'][0]['properties']['lon'] ?? null;
                return [
                    'lat' => $lat,
                    'lon' => $lon,
                ];
            }
            else{
                return [
                    'lat' => null,
                    'lon' => null,
                ];
            }

            //throw new \Exception('No location features found in API response.');
        }

        //throw new \Exception('API request failed with status: ' . $response->status());
    }
}
