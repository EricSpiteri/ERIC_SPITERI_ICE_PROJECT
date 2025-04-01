<?php
session_start();

header("Content-Type: application/json");

cors(); 
include_once("../Core/initialize.php");
include_once("../Core/config.php");
include_once("../Includes/create_Account.php");

function cors() {
    $allowedOrigins = ["http://localhost:8001", "http://localhost:3000", "http://127.0.0.1"];

    if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        exit(0);
    }
}

// Check if session is started and Logged-In is set
if (!isset($_SESSION['Logged-In']) || $_SESSION['Logged-In'] !== true) {
    sendResponse(['message' => "User Not Logged In"], 401);  // Unauthorized
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $requestData = json_decode(file_get_contents("php://input"), true);
    $product_Name = isset($requestData['product_Name']) ? $requestData['product_Name'] : '';
    $purchase_Date = isset($requestData['purchase_Date']) ? $requestData['purchase_Date'] : '';

    if (empty($product_Name) || empty($purchase_Date)) {
        sendResponse(['message' => "Product Name and Purchase Date are required."], 400);  // Bad Request
        exit;
    }

    $registration = new Registration($db);
    $product = new Product($db);

    // Set product serial number for registration
    $registration->serial_Number = $product->serial_Number;

    // Try to register the product
    if ($registration->createRegistration()) {
        sendResponse(['message' => "Product Successfully Registered."]);
    } else {
        sendResponse(['message' => "Product Registration Failed."], 500);  // Internal Server Error
    }
}

// Helper function to send responses
function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
}
?>
