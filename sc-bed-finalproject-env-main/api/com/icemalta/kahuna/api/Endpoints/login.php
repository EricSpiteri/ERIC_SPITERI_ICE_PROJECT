<?php

header("Content-Type: application/json");


cors(); 
include_once("../Core/initialize.php");
include_once("../Core/config.php");
include_once("../Includes/admin.php");
include_once("../Includes/create_Account.php");





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


//Admin login
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $requestData = json_decode(file_get_contents("php://input" ) ,true);
        $email = isset($requestData['email']) ? $requestData['email'] : '';
        $password = isset($requestData['password']) ? $requestData['password'] : '';
        
        $user_Account = new User_Account($db);
        $result = $user_Account->read_Account();
        $num = $result->rowCount();

if($num > 0){
    $account_list = array();
    $account_list['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $account_item = array(
            "account_Email" => $account_Email,
            "password"  => $password,
        );

        array_push($account_list['data'], $account_item);
    }
    echo json_encode($account_list);
}
else{
    echo json_encode(array("message" => "No Accounts found"));
}

       $emailCredential = $account_item['account_Email'];
       $passwordCredential = $account_item['password'];


        
        //validating login credentials

        if($email === $emailCredential && $password === $passwordCredential){
            $_SESSION ['logged-in'] = true;
            
            
            sendResponse(['message' => "User Logged-In"]);
            

        }

    }


    //Sending response as JSON
    function sendResponse($data) {
        echo json_encode($data);
    }



    
    