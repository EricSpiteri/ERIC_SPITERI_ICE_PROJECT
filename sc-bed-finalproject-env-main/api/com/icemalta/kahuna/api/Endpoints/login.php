<?php
cors(); 
include_once("../Core/initialize.php");
include_once("../Core/config.php");
include_once("../Includes/admin.php");





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


$requestData = json_decode(file_get_contents("php://input"), true);

//Admin login
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $requestData = json_decode(file_get_contents("php://input" ) ,true);
        $email = isset($requestData['email']) ? $requestData['email'] : '';
        $password = isset($requestData['password']) ? $requestData['password'] : '';

        $correctEmail = 'Gforce2009@gmail.com';
        $correctPassword = 'S@BERLING';
        
        echo($password);
        //validating login credentials

        if($email === $correctEmail && $password === $correctPassword){
            $_SESSION ['logged-in'] = true;
            
            
            sendResponse(['message' => 'Administrator Logged-In']);
            

        }

    }


    //Sending response as JSON
    function sendResponse($data) {
        echo json_encode($data);
    }



    
    