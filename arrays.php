<?php

//arrays in PHP

//arrays are one of the most powerful variable array structures in php
//They allow you to store multiple values in a single variable and are essential for mahy programming tasks
//lets explore more in details

//1. Types of arrays in php
//Php supports these main types of arrays

//1.Indexed arrays (NUMERIC ARRAYS)
//Arrays with numeric keys typically starting from 0

$fruits =["apple", "banana","orange"];
echo $fruits[0]; //apple

//creating indexed arrays
$colors = ["red","green","blue"]; //short array syntax (php 5.0++)
$numbers = array(1, 2, 3, 4, 5); //Traditional array syntax

//Adding elements in  indexed arrays
$colors[]= "yellow"; //Add to the end of the array
array_push ($colors, "purple", "pink"); //adds multiple values to the end 

//2.assortiative arrays
//Arrays with named keys
$person = [
    "name" => "junior",
    "age" => "30",
    "city" => "new york"
];
    

echo $person["name"]. "<br>"; //Outputs name

//Creating assortiative arrays
$user = [
    "id" => 1,
    "username" => "juniorhexe",
    "Language" => "en"
];

    $settings = array (
    "theme" => "dark",
    "notification" => true,
    "Lnguage" => "en"
);


//Adding elements as assortiative arrays
$user["role"] = "admin";

//3.multidimensional arrays
//arrays containing other arrays
$matrix =[
    [ 1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

echo $matrix[1][2] . "<br>"; //Outputs 6 (row 1, column 2)

//Assortiative multidimensional arrays
$users = [
   "john" => [
       "age" => 30,
       "email" => "johngmail.com",
       "roles" => ["admin" , "editor"] 
   ],
    "jane" => [
        "age" => 30,
       "email" => "janegmail.com",
       "roles" => ["editor"] 
       ],
    ];
    
echo $users["john"]["email"]. "<br>";

echo $users["jane"] ["roles"] [0] . "<br>";

//3.array manipulation
//Creating and modifying arrays
$fruits =["apple", "banana","orange"];

//Adding elements
$fruits[]= "grape"; //Add to the end
array_push($fruits, "mango", "kiwi"); //Add variable to the end
array_unshift($fruits, "pear"); //ADD to the beginning
echo $fruits [0]."<br>";

//Removing elements
$last = array_pop($fruits); //Remove and return the last element
$first = array_shift($fruits); //Remove and return the last element
unset($fruits[1]); //Removes specified elements
echo $fruits [0]. "<br>";

//Slicing arrays
$slice = array_slice($fruits, 1, 1); //extract portion effect lenght
echo $fruits [0]."<br>";
//SPLITING arrays (modifies original)
array_splice($fruits, 1, 2, ["pineaaples", "melon"]);
echo $fruits[1]. "<br>";
//Merging arrrays
$more_fruits = ["straw berry", "paspberry"];
$all_fruits = array_merge( $fruits, $more_fruits);
echo $fruits[0]."<br>";
//combining arrays
$keys = [ "a","b","c"];
$values = [1, 2, 3];
$combine = array_combine($keys , $values);
echo $keys[0],$values[2]."<br>";
//Checking arrays elements
$has_apple = in_array("apple", $fruits); //check if value exists
$key =array_search("banana", $fruits); //find key of value
$exists =isset($fruits[0]); //check if index exists

//Extracting keys and values
$keys= array_keys($person); // Get all values
$keys = array_values($person); //Get all values

//4.Array sorting
$numbers = [2,3,4,5,6];
$fruits = ["orange", "apple","banana","grape"];
$scores = ["john" => 80, "Alice" => 90, "bob" =>70];

//Sorting indexed arrays
sort($numbers); //SORT IN DESCENDING ORDER (modifying the original array)
// $numbers is now 1,2,3,4,5

rsort($fruits); //sort in descending oerder
//$fruits is now [ "orange" .. etc]

//sorting associative arrays
asort($scores); //sort by values, maintain key association
//$scores is now ["bob"=.70 etc]

arsort($scores); //sort by value in descending order
//$scores is now ["alice"=>90 etc]

ksort($scores); //sort by key in ascending order
//$scores is now ["alice" =>90]

krsort($scores); //sort by key in descending  order
//$scores is now ["john" =>80 etc]

//Natural order sorting (for human readables strings)
$files = ["img.jpg","img10.jpg","img2.jpg"];
sort($files); //standard sort img1.jpg etc
natsort($files); //Natural sort img1.jpg etc

//SHUFFLE array elements randomly
shuffle($numbers);

//Tommorow
//4. Array iterations 
//5.Array operations
//6.Array functions

//OOP - OBJECT ORIENTED PROGRAMING

