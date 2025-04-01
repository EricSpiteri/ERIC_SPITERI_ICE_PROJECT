<?php
session_start();
header("Content-Type: application/json");

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
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        exit(0);
    }
}

cors();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Secure database connection
    $pdo = new PDO("mysql:host=mariadb;dbname=".$db_Name.";charset=utf8;", $db_User, $db_Password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $stmt = $pdo->prepare("
            SELECT 'Registration' AS role, password AS account_password, AccountID AS account_id 
            FROM Account WHERE serial_Number = ?
        ");

}

















    function sendResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        echo json_encode($data);
    }