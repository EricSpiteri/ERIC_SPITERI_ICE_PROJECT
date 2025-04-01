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
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
        exit(0);
    }
}

cors();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents("php://input"), true);

    $email = $requestData['email'] ?? '';
    $password = $requestData['password'] ?? '';

    if (empty($email) || empty($password)) {
        sendResponse(['message' => "Email and password are required."], 400);
        exit;
    }

    try {
        // Secure database connection
        $pdo = new PDO("mysql:host=mariadb;dbname=".$db_Name.";charset=utf8;", $db_User, $db_Password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        // Single query to check both Account and Admin
        $stmt = $pdo->prepare("
            SELECT 'account' AS role, password AS account_password, AccountID AS account_id 
            FROM Account WHERE account_Email = ?
            UNION 
            SELECT 'Admin_Account' AS role, admin_Account_Password AS account_password, admin_Account_ID AS account_id 
            FROM Admin_Account WHERE admin_Account_Email = ?
        ");

        $stmt->execute([$email, $email]);
        $row = $stmt->fetch();

        if (!$row) {
            sendResponse(['message' => "Login Failed, Incorrect Credentials"], 401);
            exit;
        }

        // Validate password
        if (!password_verify($password, $row['account_password'])) {
            sendResponse(['message' => "Login Failed, Incorrect Credentials"], 401);
            exit;
        }

        // Set session variables securely
        $_SESSION['Logged-In'] = true;
        $_SESSION['AccountID'] = $row['account_id'];
        $_SESSION['Role'] = $row['role'];

        sendResponse([
            'message' => ($row['role'] === 'Admin_Account') ? 'Admin Logged-In' : 'User Logged-In',
            'role' => $row['role'],
            'account_id' => $row['account_id']
        ]);

    } catch (PDOException $e) {
        sendResponse(['error' => "Database error. Please try again later."], 500);
    }
}

function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
}
?>

