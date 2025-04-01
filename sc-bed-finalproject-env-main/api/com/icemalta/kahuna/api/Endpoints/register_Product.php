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



if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['Logged-In'] === true){

    $requestData = json_decode(file_get_contents("php://input"), true);

    $product_Name = isset($requestData['product_Name']) ? $requestData['product_Name'] : '';
    $purchase_Date = isset($requestData['purchase_Date']) ? $requestData['purchase_Date'] : '';

    $registration = new Registration($db);
    $product = new Product($db);

    $registration->serial_Number = $product->serial_Number;

    if($registration->createRegistration()){
        echo json_encode(array("message" => "Product Successfully Registered."));
      } else {
        echo json_encode( array("message" => "Product Registration Failed."));
     
            }
     
         } else{
            sendResponse(['message' => "User Not Logged In"]);
         }
         function sendResponse($data, $statusCode = 200) {
            http_response_code($statusCode);
            echo json_encode($data);
        }