<?php

// session_start();
// define('APPLICATION_PATH', getcwd());
// require_once APPLICATION_PATH . '/mvc/Bridge.php';
// require_once APPLICATION_PATH . '/mvc/admin/BridgeAdmin.php';
// //require_once APPLICATION_PATH . '/admin/Bridge.php';
// $route = $_GET["url"];
// $route = explode("/", filter_var(trim($route, "/")));
// if (DEBUG) {
//     ini_set('display_errors', '1');
//     ini_set('display_startup_errors', '1');
//     error_reporting(E_ALL);
// }
// if ($route[0] == 'admin') {
//     exit("admin");
// } else {
//     $notoli = new Route();
// }
session_start();
define('APPLICATION_PATH', getcwd());
require_once APPLICATION_PATH . '/mvc/Bridge.php';

if (DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

$notoli = new Route();
