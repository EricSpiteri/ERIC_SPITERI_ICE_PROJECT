<?php
cors(); 
require_once("../../Core/initialize.php");
require_once("../../Core/config.php");
require_once("../../Includes/admin.php");



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



    
    //Admin adds product


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['logged-in'] ===true ) {


        if(!isset($_SESSION['logged-in']) || $_SESSION ['logged-in'] !== true){
            sendResponse(['message' => 'Unauthorized. Please log in first.']);
            exit();
        }


        $requestData = json_decode(file_get_contents("php://input" ) ,true);
        $name = isset($requestData['name']) ? $requestData['name'] : '';
        $serial_Number = isset($requestData['serial_Number']) ? $requestData['serial_Number'] : '';
        $price = isset($requestData['price']) ? $requestData['price'] : '';
        $warranty = isset($requestData['warranty']) ? $requestData['warranty'] : '';

       
        $admin = new Admin($db);

        $adminResult=$admin->read();
        $adminNum=$adminResult->rowCount();

        //Adding Product
        if($adminNum > 0){
        $admin = new Admin($db);

        $adminResult = $admin->addProduct();
        $adminNum=$adminResult->rowCount();

        $admin_List = array();
        $admin_List['data'] = array();

        while($row = $adminResult->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $admin_item = array(
                "serial_Number" => $serial_Number,
                "product_Name" => $product_Name,
                "warranty" => $warranty,
                "price" => $price,
            );

            array_push($admin_List['data'], $admin_item);

        }

        echo json_encode($admin_List);

    }else{
        echo json_encode(array("message" => "No Products Registered"));
    }





    //Sending response as JSON
    function sendResponse($data) {
        echo json_encode($data);
    }

}