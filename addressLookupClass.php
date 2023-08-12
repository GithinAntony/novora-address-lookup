<?php
class addressLookupClass {
    private $googleApiKey;

    public function __construct($googleApiKey) {
        $this->googleApiKey = $googleApiKey;
    }
    //  coordinates from Google Maps API
    public function getGoogleMapsCoordinates($inputAddress) {
        $results = array();
        $results['error_status'] = 1;

        $apiUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($inputAddress) . "&key=" . $this->googleApiKey;

        try {
            // Send HTTP request and retrieve response
            #$response = file_get_contents($apiUrl);
           //bypassing response variable 
            $response = file_get_contents('exampleGoogleResponse.json');
            $data = json_decode($response, true);
 
            // Check if valid coordinates are found
            if (!empty($data['results'][0]['geometry']['location'])) {

                $results['address'] = $data['results'][0]['formatted_address'];
                $results['latitude'] = $data['results'][0]['geometry']['location']['lat'];
                $results['longitude'] = $data['results'][0]['geometry']['location']['lng'];
                $results['error_status'] = 0;  // No errors
            }
        } catch (Exception $e) {
            $results['error_status'] = 1;  // Exception caught
        }

        return $results;
    }

    // coordinates from OpenStreetMap API
    public function getOpenStreetMapsCoordinates($inputAddress) {
        $results = array();
        $results['error_status'] = 1;
        $encodedLocation = urlencode($inputAddress);
        $apiUrl = "https://nominatim.openstreetmap.org/search?q={$encodedLocation}&format=json";

        // Initialize cURL session for API request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'YourApp/1.0');

        try {
            // Execute cURL request and retrieve response
            $response = curl_exec($ch);

            if ($response !== false) {
                $locationData = json_decode($response, true);

                // Check if valid coordinates are found
                if (!empty($locationData)) {
                    foreach ($locationData as $result) {
                        $results['address'] = $result['display_name'];
                        $results['latitude'] = $result['lat'];
                        $results['longitude'] = $result['lon'];
                        $results['error_status'] = 0;  // No errors
                        break;
                    }
                }
            }
        } catch (Exception $e) {
            $results['error_status'] = 1;  // Exception caught
        }
        curl_close($ch);
        return $results;
    }
}