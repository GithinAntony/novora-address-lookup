<?php
#error_reporting(0); 
require_once("addressLookupClass.php");

// Default value for the AJAX error status
$resultsArray['ajax_error_status'] = 1;

// Checking if the HTTP method is POST and if the "address" parameter is set in the POST data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["address"])) {
    $inputAddress = $_POST['address'];

    // Since we are not using orginal google api key
    $googleApiKey = 'YOUR_GOOGLE_API_KEY'; // Replace with your Google API key
    
    $addressLookupClass = new addressLookupClass($googleApiKey);
    
    // Fetch coordinates from Google Maps and OpenStreetMap APIs
    $googleResults = $addressLookupClass->getGoogleMapsCoordinates($inputAddress);
    $osmResults = $addressLookupClass->getOpenStreetMapsCoordinates($inputAddress);
    
    // AJAX error status to indicate successful execution
    $resultsArray['ajax_error_status'] = 0;
    
    // Store the results in the array
    $resultsArray['googleResults'] = $googleResults;
    $resultsArray['osmResults'] = $osmResults;
}

// Encode the results array as JSON and print it
header('Content-Type: application/json');
echo json_encode($resultsArray);
?>
