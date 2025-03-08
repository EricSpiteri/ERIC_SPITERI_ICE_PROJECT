<?php 
cors();


require_once("../../Core/initialize.php");
require_once("../../Core/config.php");
require_once("../../Includes/create_Account.php");

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

    $user_Account = new User_Account($db);



    //Creating a new account
    $user_Account_Result = $user_Account->createAccount();
    $user_Account_Num=$user_Account_Result->rowCount();



    if($user_Account_Num > 0){

    $user_Account_List = array();
    $user_Account_List['data'] = array();

    while($row = $user_Account_Result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_Account_item = array(
            "AccountID" => $AccountID,
            "account_Name" => $account_Name,
            "account_Surname" => $account_Surname,
            "country_Code" => $country_Code,
            "mobile_Number" => $mobile_Number,
            "account_Email" => $account_Email,
            "password" => $password,
            "postcode" => $postcode,
            "house_Number" => $house_Number,
            "street" => $street,
            "locality" => $locality,
        );

        array_push($user_Account_List['data'], $user_Account_item);

    }

    echo json_encode($user_Account_List);

}else{
    echo json_encode(array("message" => "No Users Registered"));
}





//Sending response as JSON
function sendResponse($data) {
    echo json_encode($data);
}

}




?>