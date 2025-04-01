<?php 
cors();

header("Access-Control-Allow-Origin: *");
header(header: "Content-Type: application/json");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

require_once("../Core/initialize.php");
require_once("../Core/config.php");
require_once("../Includes/create_Account.php");

//Create Account


function cors()
{
 // Allow from any origin
 if (isset($_SERVER['HTTP_ORIGIN'])) {

 header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
 header('Access-Control-Allow-Credentials: true');
 header('Access-Control-Max-Age: 86400');
 }
 if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))

 header("Access-Control-Allow-Methods: POST");
 if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
 header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 exit(0);
 }
}


session_start();

$_SESSION['Admin-logged-In'] =false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $requestData = json_decode(file_get_contents("php://input" ) ,true);


    $user_Account = new User_Account($db);

    //Create an User account

    // Assign values safely
    $user_Account->account_Name = $requestData['account_Name'] ?? '';
    $user_Account->account_Surname = $requestData['account_Surname'] ?? '';
    $user_Account->country_Code = isset($requestData['country_Code']) ? intval($requestData['country_Code']) : null;
    $user_Account->account_Email = $requestData['account_Email'] ?? '';
    $user_Account->password = isset($requestData['password']) ? ($requestData['password']) : null;
    $user_Account->postcode = $requestData['postcode'] ?? '';
    $user_Account->house_Number = isset($requestData['house_Number']) ? intval($requestData['house_Number']) : null;
    $user_Account->street = $requestData['street'] ?? '';
    $user_Account->mobile_Number = $requestData['mobile_Number'] ?? '';
    $user_Account->country = $requestData['country'] ?? '';
    $user_Account->locality = $requestData['locality'] ?? '';

    


if($user_Account->createAccount()){
    sendResponse(["message" => "Account Created"]);
}
else{
    sendResponse(["message" => "Account Creation Failed"]);
}

} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['Admin-logged-In'] === true) {

    $requestData = json_decode(file_get_contents("php://input" ) ,true);


    $admin_Account = new Admin_Account($db);


    //Create an Admin account

    // Assign values safely
    $admin_Account->admin_Account_Name = $requestData['admin_Account_Name'] ?? '';
    $admin_Account->admin_Account_Surname = $requestData['admin_Account_Surname'] ?? '';
    $admin_Account->admin_Account_Email = $requestData['admin_Account_Email'] ?? '';
    $admin_Account->admin_Account_Password = ($requestData['admin_Account_Password']) ?? '';

    


if($admin_Account->create_Admin_Account()){
    sendResponse(["message" => "Account Created"]);
}
else{
    sendResponse(["message" => "Account Creation Failed"]);
}
}

function sendResponse($data) {
    echo json_encode($data);
}