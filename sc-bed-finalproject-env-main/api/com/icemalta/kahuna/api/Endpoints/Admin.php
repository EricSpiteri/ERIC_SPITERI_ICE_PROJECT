<?php 




function cors() {
    // Allow from any origin
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    // Handle preflight requests (OPTIONS method)
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
}

session_start();
cors();



//Admin login
    if($_SERVER['REQUEST_METHOD'] ==='POST'){

        $requestData = json_decode(file_get_contents("php://input" ) ,true);
        $email = isset($requestData['email']) ? $requestData['email'] : '';
        $password = isset($requestData['password']) ? $requestData['password'] : '';

        $correctEmail = 'Gforce2009@gmail.com';
        $correctPassword = 'S@BERLING';

        //validating login credentials

        if($email === $correctEmail && $password ===$correctPassword){
            $_SESSION ['logged-in'] = true;
            
            sendResponse(['message' => 'Administrator Logged-In']);
            

        } else{
            sendResponse(['message' => 'Admin Log-in Attempt Failed:']);
        }

    }


    //Sending response as JSON
    function sendResponse($data) {
        echo json_encode($data);
    }

?>