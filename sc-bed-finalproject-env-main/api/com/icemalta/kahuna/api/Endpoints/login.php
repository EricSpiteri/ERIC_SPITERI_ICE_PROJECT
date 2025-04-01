<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/php_errors.log');

$isLocalhost = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1', '::1']);

// Session configuration
$sessionName = 'SECURE_SESS_' . md5($_SERVER['HTTP_HOST']);
$sessionLifetime = 86400 * 30;

ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', $sessionLifetime);

session_name($sessionName);
session_set_cookie_params([
    'lifetime' => $sessionLifetime,
    'path' => '/',
    'domain' => $isLocalhost ? null : $_SERVER['HTTP_HOST'],
    'secure' => !$isLocalhost,
    'httponly' => true,
    'samesite' => 'Lax'
]);

session_start();

if (empty($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
    $_SESSION['created'] = time();
}

// Headers
header("Content-Type: application/json");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");

$allowedOrigins = [
    "http://localhost:8001", 
    "http://localhost:3000", 
    "http://127.0.0.1"
];

if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, DELETE");
    
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    
    exit(0);
}

require_once("../Core/initialize.php");
require_once("../Core/config.php");
require_once("../Includes/create_Account.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $requestData = json_decode(file_get_contents("php://input"), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            sendResponse(['message' => "Invalid JSON data"], 400);
            exit;
        }

        $email = filter_var($requestData['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $requestData['password'] ?? '';

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            sendResponse(['message' => "Valid email is required"], 400);
            exit;
        }

        if (empty($password)) {
            sendResponse(['message' => "Password is required"], 400);
            exit;
        }

        $pdo = new PDO("mysql:host=mariadb;dbname=".$db_Name.";charset=utf8;", $db_User, $db_Password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        $stmt = $pdo->prepare("
            SELECT 'account' AS role, password AS account_password, AccountID AS AccountID
            FROM Account WHERE account_Email = ? 
            UNION 
            SELECT 'Admin_Account' AS role, admin_Account_Password AS account_password, admin_Account_ID AS admin_Account_ID
            FROM Admin_Account WHERE admin_Account_Email = ?
        ");

        $stmt->execute([$email, $email]);
        $row = $stmt->fetch();

        if (!$row || !password_verify($password, $row['account_password'])) {
            sendResponse(['message' => "Login Failed, Incorrect Credentials"], 401);
            exit;
        }

        $_SESSION['Logged-In'] = true;
        $_SESSION['AccountID'] = $row['AccountID'];
        $_SESSION['Role'] = $row['role'];
        $_SESSION['last_activity'] = time();

        sendResponse([
            'message' => ($row['role'] === 'Admin_Account') ? 'Admin Logged-In' : 'User Logged-In',
            'role' => $row['role'],
            'AccountID' => $row['AccountID']
        ]);

    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        sendResponse(['error' => "Database error. Please try again later."], 500);
    } catch (Exception $e) {
        error_log("General error: " . $e->getMessage());
        sendResponse(['error' => "An unexpected error occurred"], 500);
    }
}

function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}
?>