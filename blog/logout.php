<?php

require_once "include/config,php";

// unset all session variable 
$_SESSION= array();

// destroy the session
session_destroy();

// redirect to login page
header('location:' . BASE_URL.'/login.php');
exit;