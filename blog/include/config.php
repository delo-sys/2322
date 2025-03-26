<?php

// error reporting for development 
ini_set ('display_error',1);
ini_set ('display_start_up_error',1);
error_reporting(E_ALL);

// Session start 
session_start();

// database configuration
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','blog_db');


// site URL
define('BASE_URL','http://localhost/blog');

// autoload classes
spl_autoload_register(function($className) {
    $file = __DIR__ .'/classes/'. $className.'.php';
    if (file_exists($file)) {
        require_once $file;
    }
});