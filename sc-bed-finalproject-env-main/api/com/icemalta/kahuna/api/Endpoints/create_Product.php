<?php 
//Register new product (ADMIN ONLY)
cors();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");





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


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $requestData = json_decode(file_get_contents("php://input" ) ,true);

    $serial_Number = isset($requestData['serial_Number']) ? $requestData['serial_Number'] : '';

    $product_Name = isset($requestData['product_Name']) ? $requestData['product_Name'] : '';

    $price = isset($requestData['price']) ? $requestData['price'] : '';

    $warranty = isset($requestData['warranty']) ? $requestData['warranty'] : '';

    $product_Image_ID = isset($requestData['product_Image_ID']) ? $requestData['product_Image_ID'] : '';

    }


session_start();

//Create a New Product

$product = new Product($db);

    $Product->serial_Number = $requestData->serial_Number;
    $Product->product_Name = $requestData->product_Name;
    $Product->price = intval($requestData->price);
    $Product->warranty = intval($requestData->warranty);
    $Product->product_Image_ID =($requestData->product_Image_ID);


if($user_Account->createAccount()){
    echo json_encode(array("message" => "Product Successfully Created."));
}
else{
    echo json_encode(array("message" => "Product Creation Failed."));
}

?>