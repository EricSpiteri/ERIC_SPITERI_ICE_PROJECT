<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("../../Core/initialize.php");
require_once("../../Core/config.php");
require_once("../../Includes/create_Account.php");

//Create Account
$user_Account = new User_Account($db);

?>