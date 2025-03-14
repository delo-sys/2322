<?php
//Get vs Post methods

/**
 * Get method
 * --Data is apended to the URL as query parameters
 * --Limited amount of data can be sent (URL lenght restriction)
 * Data is visible in the URL (not secure for sensitive information)
 * Good for simple data retrival ,searching , filtering
 * 
 * POST method
 * -Data is sent in the HTTP request body
 * -Can send much larger amounts of data
 * -Data is not visible to the URL (more secure)
 * -Required for file uploads
 * -Used for operations that change data
 */

 //Processing different form input types
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Text input
    $username = $_POST['username'] ?? "";
    
    //Password(never echo passwords to a real application)
    $password = $_POST['password'] ?? "";

    //Checkbox(will be set only if checked)
    $subscribe = isset($_POST['suscribe']) ? true : false;

    //Radio Button
    $gender = $_POST['gender'] ?? ""; //wil contain the selected

    //select dropdown
    $country =$_POST['country'];

    //multi-select(return array)
    $interests = $_POST['interests'] ?? [];

    //Hidden field
    $formid = $_POST['form_id'] ?? "";

    //displaysome results for demonstration
    echo "username: $username<br>";
    echo "subscribe: " .($subscribe ? "yes" : "No") . "<br>";
    echo "Gender: $gender<br>";
    echo "Country: $country<br>";
    echo "interests:" . implode(",", $interests) . "<br>";
    echo "Form ID: $formid<br>";
 }

 //Handling GET request
 //process_search.php?query=php$category=tutorials
 if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $searchQuery = $_GET['Query'] ?? "";
    $category = $_GET['category'] ?? "";

    echo "Searching for '$searchQuery' in category '$category'<br>";
 }
    
?>