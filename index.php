<?php
class addressLookupService {
    private $googleApiKey;

    public function __construct($googleApiKey) {
        $this->googleApiKey = $googleApiKey;
    }

    public function getGoogleMapsCoordinates($inputAddress) {
    /* Google Working*/
    // Construct the API URL
    $apiUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($inputAddress) . "&key=" . $this->googleApiKey;

    // Send an HTTP request to the API URL
    $response = file_get_contents($apiUrl);

    // Decode the JSON response
    $data = json_decode($response, true);

    $results = array();
    $results['error_status'] = 1;
    // Extract latitude and longitude
    if (!empty($data['results'][0]['geometry']['location'])) {
        $results['address'] = $inputAddress;
        $results['latitude'] = $data['results'][0]['geometry']['location']['lat'];
        $results['longitude'] = $data['results'][0]['geometry']['location']['lng'];
        $results['error_status'] = 0;
    } 
    /* Google Working ends*/
    return $results;
    }

    public function getOpenStreetMapsCoordinates($inputAddress) {
        /* OSm Working  */
        $encodedLocation = urlencode($inputAddress);
        $apiUrl = "https://nominatim.openstreetmap.org/search?q={$encodedLocation}&format=json";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'YourApp/1.0'); // Replace with your app's name and version
        $response = curl_exec($ch);

        $results['error_status'] = 1;
        if ($response === false) {
            #echo "cURL Error: " . curl_error($ch);
            $results['error_status'] = 1;
        } else {
            $locationData = json_decode($response, true);
            if (!empty($locationData)) {
                foreach ($locationData as $result) {
                    $results['address'] = $inputAddress;
                    $results['latitude'] = $result['lat'];
                    $results['longitude'] = $result['lon'];
                    $results['error_status'] = 0;       
                    break;
                }
            } else {
                $results['error_status'] = 1;
            }
        }
        curl_close($ch);
        /* OSm Working Ends */
        return $results;
    }

}
    $resultsFlag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["serachSubmit"])) {

    $resultsFlag = 1;
    #$inputAddress = $_POST["inputAddress"];
    $inputAddress = '1600 Amphitheatre Parkway, Mountain View, CA';

    $googleApiKey = 'AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg'; // Our google api key
    $addressLookupService = new addressLookupService($googleApiKey);

    $googleResults = $addressLookupService->getGoogleMapsCoordinates($inputAddress);
    $osmResults = $addressLookupService->getOpenStreetMapsCoordinates($inputAddress);    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Address Lookup</title>
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
<div class="container">
  <div class="header">
    Novora
  </div>
  <div class="row">
    <div class="column column-left">
      <h1 class="h1-center">Enter your address</h1>
      <form action="" method="post" name="addressLookupForm">
        <label for="address">Address:</label>
        <input type="text" id="inputAddress" name="inputAddress" required>
        <button type="submit" name="serachSubmit">Search</button>
      </form>
    </div>
    <div class="column column-right">
        <?php if ($resultsFlag == 1) { ?>
        <h1>Google Results</h1>
        <?php print_r($googleResults); ?>

        <br /> <br /> <br />
        <h1>Osm Results</h1>
        <?php print_r($osmResults);?>
       <?php  } ?>
    </div>
  </div>
  <div class="footer">
  ©2023
  </div>
</div>
</body>
</html>
