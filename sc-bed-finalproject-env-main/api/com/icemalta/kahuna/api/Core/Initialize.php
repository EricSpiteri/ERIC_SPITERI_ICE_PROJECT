<?php
//Define names constants (to be used in other areas of the API)

//DS = / or \ depending on server OS/config
//SITE_ROOT = root directory of project
defined("DS") ? null :define("DS", DIRECTORY_SEPARATOR);
define("SITE_ROOT", dirname(__DIR__) . DS . "SC-BED-FINALPROJECT-ENV-MAIN" . DS . "api" . DS . "com"  . DS . "api");

//to be used to include all necessary files for api to start
defined("CORE_PATH") ? null : define("CORE_PATH", SITE_ROOT.DS."core");
defined("INC_PATH") ? null : define("INC_PATH", SITE_ROOT.DS."includes");
?>