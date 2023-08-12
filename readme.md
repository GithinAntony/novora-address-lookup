# Address Coordinates Lookup

This project provides a solution to retrieve and display coordinates (longitude and latitude) for an address using Google Maps and OpenStreetMap (OSM) APIs. The solution is implemented with a frontend component using jQuery and JavaScript, and a backend PHP application using Object-Oriented Programming (OOP) principles.

## Problem Statement

The goal of this project is to create a web application that takes an address as input and displays the coordinates of the address from both Google Maps and OpenStreetMap sources.

## Solution

### Frontend

The frontend component is developed using jQuery and JavaScript. It includes a user interface with an input field for entering the address and buttons to initiate the coordinate retrieval process utilizing Ajax. The retrieved coordinates are displayed on the screen.

### Backend

The backend is a PHP application built with an Object-Oriented approach. It handles the communication with the Google Maps and OpenStreetMap APIs to retrieve the coordinates based on the provided address. The application is designed to be modular and extendable, making it easy to add more APIs for coordinate retrieval.

## Assumptions and Choices

- The project uses Google Maps and OpenStreetMap as the default coordinate sources.
- The solution is intended to be a demonstration of frontend-backend interaction and does not focus on advanced error handling or UI design.

## How to Run

1. Clone this repository to your local machine.
2. Configure your web server (e.g., XAMPP) to serve the project from the appropriate directory.
3. Run composer to install PhpUnit test files if needed.
3. Open the project in a web browser by navigating to `http://localhost/{ Drirectory-Name}`.


## Running Tests

1. The PHP backend includes unit tests. You can run the tests by executing AddressLookupTest.php test file using a tool like PHPUnit.



