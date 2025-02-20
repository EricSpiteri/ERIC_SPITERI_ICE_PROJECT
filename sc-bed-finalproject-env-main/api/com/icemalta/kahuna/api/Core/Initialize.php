<?php
//Define names constants (to be used in other areas of the API)

//DS = / or \ depending on server OS/config
//SITE_ROOT = root directory of project
defined("DS") ? null :define("DS", DIRECTORY_SEPARATOR);
defined("SITE_ROOT") ? null : define("SITE_ROOT", DS."xampp".DS."htdocs".DS."API-2025");

//to be used to include all necessary files for api to start
defined("CORE_PATH") ? null : define("CORE_PATH", SITE_ROOT.DS."core");
defined("INC_PATH") ? null : define("INC_PATH", SITE_ROOT.DS."includes");
?>