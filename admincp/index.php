<?php

session_start();
define('APPLICATION_PATH', getcwd() . '/..');
define('APPLICATION_VIEW_PATH', getcwd() . '/views');
require_once APPLICATION_PATH . '/mvc/Bridge.php';
define('SITE_ROOT', str_replace("admincp", "", getcwd()));
if (DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

$notoli = new Route();
