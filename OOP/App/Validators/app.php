<?php

require_once "autoloader.php";

//How you can use classes without manual reqiures
$userController = new App\Controllers\UserController();
$user = $userController->getUser(1);
echo $userController->getName(); //Output "john doe"

/**
 * Namespace key concepts
 * Namespace help organize code and avoid naming conflicts
 * Use the "Namespace" keyword at the top of your file
 * import classes with the use keyword
 * create aliases with :use Namespace class as Alias
 * Reference global namespaces with leading backslash(Namespace\class)
 * 
 * Autoloading
 * - Automatically loads clas files when they are needed
 *  -PSR -4 IS a common standard for autoloading 
 * -Composer provided  robust autoloader functionality
 */