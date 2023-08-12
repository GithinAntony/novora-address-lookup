# Address Coordinates Lookup

This project provides a solution to retrieve and display coordinates (longitude and latitude) for an address using Google Maps and OpenStreetMap (OSM) APIs. The solution is implemented with jQuery and JavaScript as fronend and plain PHP with Object-Oriented Programming (OOP) principles as backend.

## Problem Statement

The goal of this project is to create a web application that takes an address as input and displays the coordinates of the address from both Google Maps and OpenStreetMap sources.

## Solution

### Frontend

The frontend component is developed using HTML, JavaScript asn JQuery. It includes a user interface with an input field for entering the address and results retrieved are displayed using ajax. 

### Backend

The backend is built on PHP with an Object-Oriented approach. It handles the communication with the Google Maps and OpenStreetMap APIs to retrieve the coordinates based on the provided address. The application is designed to be modular and extendable, making it easy to add more APIs in future.

## Assumptions and Choices

- The project uses Google Maps and OpenStreetMap as the default coordinate sources.
- The solution is intended to be a demonstration of frontend-backend interaction using ajax.
- Note that the you must copy paste your google api key in the processRequest.php 13th line.
- you must also comment the 19th line and uncomment 17th line for your google api keys to work. For now demo data is displayed for google api results. Note that the results    will be always same till you change the api.

## How to Run

1. Clone this repository to your local machine.
2. Configure your web server (e.g., XAMPP) to serve the project from the appropriate directory.
3. Run composer to install PhpUnit test files if needed.
3. Open the project in a web browser by navigating to `http://localhost/{ Drirectory-Name}`.


## Running Tests

1. The PHP backend includes unit tests. You can run the tests by executing AddressLookupTest.php test file using a tool like PHPUnit.



