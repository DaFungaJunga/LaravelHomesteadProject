<?php
// ERROR REPORTING
error_reporting(E_ALL & ~E_NOTICE);

// DATABASE SETTINGS
define('DB_HOST', 'localhost');
define('DB_NAME', 'homestead');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'homestead');
define('DB_PASSWORD', 'secret');

// FILE PATHS
//define("PATH_LIB", PATH_ROOT . "lib" . DIRECTORY_SEPARATOR);
define("PATH_LIB", "/home/vagrant/code/project/public/" . "lib" . "/");
?>
