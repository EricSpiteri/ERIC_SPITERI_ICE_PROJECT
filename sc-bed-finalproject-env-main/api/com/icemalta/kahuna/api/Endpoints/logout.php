<?php

header("Content-Type: application/json");

cors();
include_once("../Core/initialize.php");
include_once("../Core/config.php");
include_once("../Includes/create_Account.php");

function cors() {
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    // Handle preflight requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: POST");
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}

session_start();

// Check if the user is logged in
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['Logged-In']) && $_SESSION['Logged-In'] === true) {
        // Clear session data
        $_SESSION = array(); // Remove all session variables
        session_destroy();    // Destroy the session

        // Send a JSON response confirming logout
        sendResponse(['message' => 'User successfully logged out']);
    } else {
        sendResponse(['message' => 'You must be logged in first!'], 405);  // Method Not Allowed
    }
}

// Helper function to send responses
function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
}

?>
