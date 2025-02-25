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

?>