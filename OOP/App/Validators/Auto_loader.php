<?php

spl_autoload_register(function($className){
    //convert nameclass to file path
    $file = str_replace('\\', DIRECTORY_SEPARATOR. $className) .'php';
    

    if (file_exixsts($file)) {
    require $file;
    return true;
    }
    return false;
});