<?php 
cors();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

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

 header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PATCH, DELETE");
 if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
 header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 exit(0);
 }
}


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $requestData = json_decode(file_get_contents("php://input" ) ,true);
    

    $account_Name = isset($requestData['account_Name']) ? $requestData['account_Name'] : '';

    $account_Surname = isset($requestData['account_Surname']) ? $requestData['account_Surname'] : '';

    $country_Code = isset($requestData['country_Code']) ? $requestData['country_Code'] : '';

    $account_Email = isset($requestData['account_Email']) ? $requestData['account_Email'] : '';

    $password = isset($requestData['password']) ? $requestData['password'] : '';

    $postcode = isset($requestData['postcode']) ? $requestData['postcode'] : '';

    $house_Number = isset($requestData['house_Number']) ? $requestData['house_Number'] : '';

    $street = isset($requestData['street']) ? $requestData['street'] : '';

    $mobile_Number = isset($requestData['mobile_Number']) ? $requestData['mobile_Number'] : '';

    $country = isset($requestData['country']) ? $requestData['country'] : '';


    $user_Account = new User_Account($db);


    //Create an account

    // fill user properties with decoded values
    $user_Account->account_Name = $requestData->account_Name;
    $user_Account->account_Surname = $requestData->account_Surname;
    $user_Account->country_Code = $requestData->country_Code;
    $user_Account->account_Email = $requestData->account_Email;
    $user_Account->password = $requestData->password;
    $user_Account->postcode = $requestData->postcode;
    $user_Account->house_Number = $requestData->house_Number;
    $user_Account->street = $requestData->street;
    $user_Account->mobile_Number = $requestData->mobile_Number;
    $user_Account->country = $requestData->country;
    


if($user_Account->createAccount()){
    echo json_encode(array("message" => "User created."));
}
else{
    echo json_encode(array("message" => "User not created."));
}
}