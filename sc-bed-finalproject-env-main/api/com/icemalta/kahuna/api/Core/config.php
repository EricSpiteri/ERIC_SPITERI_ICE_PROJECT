<?php

//Database details
$db_Name = "Kahuna";
$db_User = "root";
$db_Password = "root";

//PDO = PHP Data Objects
//Used for Object Oriented Programming
//Creating an 'Object' makes our code much more organised
$db = new PDO("mysql:host=mariadb;dbname=".$db_Name.";charset=utf8;",
$db_User,
$db_Password);

//set some db attributes
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//load config file first for db connection
require_once(CORE_PATH.DS."config.php");

require_once(INC_PATH.DS."create_Account.php");
require_once(INC_PATH.DS."admin.php");
require_once(INC_PATH.DS."register_Product.php");
require_once(INC_PATH.DS."user_Login.php");
require_once(INC_PATH.DS."view_Product.php");

?>