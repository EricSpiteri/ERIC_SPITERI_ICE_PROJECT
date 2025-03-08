<?php
//Define names constants (to be used in other areas of the API)

//DS = / or \ depending on server OS/config
//SITE_ROOT = root directory of project
defined("DS") ? null :define("DS", DIRECTORY_SEPARATOR);
if (!defined("SITE_ROOT")) {
    define("SITE_ROOT", dirname(__DIR__));
}


//to be used to include all necessary files for api to start
defined("CORE_PATH") ? null : define("CORE_PATH", SITE_ROOT.DS."Core");
defined("INC_PATH") ? null : define("INC_PATH", SITE_ROOT.DS."Includes");
?>