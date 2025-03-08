<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("../../Core/initialize.php");
require_once("../../Core/config.php");
require_once("../../Includes/view_Product.php");


//Display Product

$product = new Product($db);

$productResult=$product->read();
$productNum=$productResult->rowCount();

if($productNum > 0){
    $product_List = array();
    $product_List['data'] = array();

    while($row = $productResult->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $customer_item = array(
                "serial_Number" => $serial_Number,
                "product_Name" => $product_Name,
                "warranty" => $warranty,
                "price" => $price,

        );

        array_push($product_List['data'], $product_item);
    }

    echo json_encode($customer_List);

} else {
    echo json_encode(array("message" => "No Products Found"));
}



//Admin adds product


if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_SESSION['logged-in']  ?? false) === true) {


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
   echo json_encode(array("message" => "Product Created."));
 } else {
   echo json_encode( array("message" => "Product not Created."));

       }

    }
?>