<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1> Contact us</h!>
    <form action="process_form.php" method= "POST">
        <label for ="name">Name</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div>  
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5"></textarea>
    </div>
    <button type="submit">send Message</button>
</form>
</body>
</html>