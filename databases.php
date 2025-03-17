<?php

// database are the backbone of most web application , allowing you to store , retrieve, and manipulate data effeiciently.
// Let's explore how PHP interact with MySQL,one of the most popular database systems.

// 1.database connection 
// the first step in worling with databases is establishing a connection . PHP offers multiple ways connect to MySQL databases.

// using MySQLi (MySQLImproved)
// Basic database connection with MySQLi(procedural style)
$host= "localhost";
$username= "root";
$password = "";
$database ="sample_db";

// // create a connection 
// $conn = mysqli_connect($host,$username,$password,$database);

// // check connection 
// if (!$conn){
//     die("connection failed:". mysqli_conect_error());
// }

// echo "connected successfully!";

// object-orinent style with MySQl
$mysqli = new mysqli ($host,$username,$password,$database);

// check connection successfully
if ($mysqli->connect_errno){
    die("ocnnection_failed:". $mysqli->connect_error);
}

echo "connected sucessfully!";

// when done 
$mysqli->close();

