<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("../../Core/Initialize.php");
require_once("../../Core/Config.php");
require_once("../../Includes/Customer.php");


//Display Posts

$customer = new Customer($db);

$CustomerResult=$customer->read();
$customerNum=$customerResult->rowCount();

if($customerNum > 0){
    $customer_list = array();
    $customer_list['data'] = array();

    while($row = $customerResult->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $customer_item = array(
            "customerID"  => $customerID,
            "customer_Name" => $customer_Name,
            "customer_Surname" => $customer_Surname,
            "email" => $email,
            "mobile_Number" => $mobilenumber,

        );

        array_push($Posts_list['data'], $customer_item);
    }

    echo json_encode($customer_list);

} else {
    echo json_encode(array("message" => "No Customers found"));
}

?>