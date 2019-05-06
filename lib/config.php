<?php
// ERROR REPORTING
error_reporting(E_ALL & ~E_NOTICE);

// DATABASE SETTINGS
define('DB_HOST', 'homestead.test');
define('DB_NAME', 'shows');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'homestead');
define('DB_PASSWORD', 'secret');

// FILE PATHS
define("PATH_LIB", PATH_ROOT . "lib" . DIRECTORY_SEPARATOR);
?>
