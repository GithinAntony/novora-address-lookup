<?php

use PHPUnit\Framework\TestCase;
require_once 'vendor/autoload.php'; // Path to your Composer autoload.php

require_once 'addressLookupClass.php';

class AddressLookupTest extends TestCase
{
    public function testGoogleMapsCoordinates()
    {
        $googleApiKey = 'your_google_api_key_here';
        $response = file_get_contents('exampleGoogleResponse.json');
        $addressLookup = new addressLookupClass($googleApiKey);

        // Replace with the address you want to test
        $inputAddress = 'Abu Dhabi';

        $result = $addressLookup->getGoogleMapsCoordinates($inputAddress);

        $this->assertArrayHasKey('error_status', $result);
        $this->assertEquals(0, $result['error_status']);
        $this->assertArrayHasKey('address', $result);
        $this->assertArrayHasKey('latitude', $result);
        $this->assertArrayHasKey('longitude', $result);
    }

    public function testOpenStreetMapsCoordinates()
    {
        $googleApiKey = 'your_google_api_key_here';
        $addressLookup = new addressLookupClass($googleApiKey);

        // Replace with the address you want to test
        $inputAddress = 'Abu Dhabi';

        $result = $addressLookup->getOpenStreetMapsCoordinates($inputAddress);

        $this->assertArrayHasKey('error_status', $result);
        $this->assertEquals(0, $result['error_status']);
        $this->assertArrayHasKey('address', $result);
        $this->assertArrayHasKey('latitude', $result);
        $this->assertArrayHasKey('longitude', $result);
    }
}

?>