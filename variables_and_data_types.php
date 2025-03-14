<?php

// Variables in php are containers for storing data
//They always start with "$" symbol

//
// The typr is determined by the value or number

// Strings are any text 

$name ="john doe";// allow variables intergration
$name ='john doe';//single quotes tweet everything as literal text

// 1.integer whole number
$age =25; //no decimal points

// 3.float/doubles numbers with decimal points
$heights =1.85; //

// 4.boolean - true/false values
$is_student =true;

// 5.Null -represents a variable with no vallie
$empty_variable = null;

// 5.Arry -ordered collections of values
$fruits = ["apple", "banana", "orange"];

//checking variables types
//var_dump()- outputs types and value
//gettypr()-outputs justthe type
echo var_dump($empty_variable) , "<br>";
echo gettype($empty_variable) , "<br>";
echo gettype($name),"<br>";
echo gettype($age),"<br>";
echo gettype($heights),"<br>";
echo gettype($is_student),"<br>";
echo gettype($fruits),"<br>";

//Type casting =converting different types
$string_number ="42";
$actual_number =(int)$string_number;

echo gettype($string_number) ,"<br>";
echo gettype($actual_number) ,"<br>";

//constants =values that cannot change
define("MAX_USERS",100); //using define()function
const MIN_AGE =18; //using const keyword (php 5.3+)

echo MAX_USERS ,"<br>";
echo MIN_AGE ,"<br>";

//variable interpolation in strings
$name =" hezekiah junior";
echo "My name is $name,<br>"; //works with double quotes
echo 'My name is' .$name ,'.'; // string procastination with dot opperator

//Next =>PHP  operators(perators.php)
?>