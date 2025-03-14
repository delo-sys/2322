<?php

// Check if the form was submitted via POST

if ($_SERVER ['REQUEST_METHOD'] == "POST") {
    //Retriving form data
    $name = $_POST ["name"] ?? "";
    $email = $_POST ["email"] ?? "";
    $message = $_POST ["message"] ?? "";

    //Basic validation
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email format";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    //Process the form if no errors
    if (empty($errors)) {
        //  In a real application , you right
        //  - send an email
        //  - save to a database
        // - log the submition
        echo"Thank you, $name! your message has been recieved";
    }else {
        //display error
        echo "<h2>Please correct the following errors:</h2>";
        echo "<u1>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</u1>";
        echo "<a href='javascript:history.back()'>GO BACK and try again</a>";
    }
    }else {
    //IF someone tries to access this file directory without submitting the form
    echo "Access denied. Please submit the form.";
}



