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


        $data = json_decode(file_get_contents("php://input" ) ,true);
        $product_Name = isset($data['product_Name']) ? $data['product_Name'] : '';
        $serial_Number = isset($data['serial_Number']) ? $data['serial_Number'] : '';
        $price = isset($data['price']) ? $data['price'] : '';
        $warranty = isset($data['warranty']) ? $data['warranty'] : '';
        $product_Image_ID = isset($data['product_Image_ID']) ? $data['product_Image_ID'] : '';



        //Adding Product
        $admin = new Admin($db);
        

        $admin->serial_Number = $data->serial_Number;
        $admin->product_Name = $data->product_Name;
        $admin->warranty = $data->warranty;
        $admin->price = $data->price;
        $admin->product_Image_ID = $data->product_Image_ID;
        

       if($admin->add_Product()){
       echo json_encode(array("message => Product Created."));
     } else {
       echo json_encode( array("message => Product not Created."));

           }

        }