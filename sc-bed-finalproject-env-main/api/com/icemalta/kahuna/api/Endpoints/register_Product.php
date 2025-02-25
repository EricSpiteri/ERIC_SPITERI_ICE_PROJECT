<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("../../Core/initialize.php");
require_once("../../Core/config.php");
require_once("../../Includes/customer.php");


//Display Customer

$customer = new Customer($db);

$customerResult=$customer->read();
$customerNum=$customerResult->rowCount();

if($customerNum > 0){
    $customer_List = array();
    $customer_List['data'] = array();

    while($row = $customerResult->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $customer_item = array(
            "customerID"  => $customerID,
            "customer_Name" => $customer_Name,
            "customer_Surname" => $customer_Surname,
            "email" => $email,
            "mobile_Number" => $mobilenumber,
            "purchase_Date" => $purchase_Date,

        );

        array_push($customer_List['data'], $customer_item);
    }

    echo json_encode($customer_List);

} else {
    echo json_encode(array("message" => "No Customers found"));
}

?>