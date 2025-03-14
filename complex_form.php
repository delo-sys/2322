<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Processing</title>
</head>
<body>
    <h1>HTML complex Form Processing</h1>

    <form action="process_complex_form.php" method="POST">
       <!-- text input -->
       <label>Name:</label>
       <input type="Text" name="username">

       <!-- password input -->
       <label>Password:</label>
       <input type="password" name="password">

       <!-- checkbox -->
       subscribe<input type="checkbox" name="subscribe" value="yes">

       <!-- Radio  button -->
       male<input type="radio" name="gender" value="male">
       female<input type="radio" name="gender" value="female">
       other<input type="radio" name="gender" value="other">

       <!-- selectdropdown -->
       <select name="country">
           <option value="KE"> Kenya</option>
           <option value="Ca"> Canada</option>
           <option value="UK"> United Kingdom</option>
       </select>

       <!-- Multi select -->
       <select name="interest[]"multiples>
          <option value="sports">sports</option>
          <option value="music">music</option>
          <option value="movies">movies</option>
       </select>

       <!-- Hidden field -->
       <input type="hidden" name="form_id" value="registration">

       <!-- submit button -->
       <button type="submit">Register</button>

    </form>
</body>
</html>