<?php

$pageTitle = 'register';

require_once ' include/header.php';

// check if already logged in 
if (isset($_SESSION['user_id'])) {
    header ('location'. BASE_URL);
    exit;
}

// process form submission
if ($_SERVER['REQUEST_METHOD']=='POST') {
    // validate form 
    $username =$_POST['username']?? '';
    $email =$_POST['email']?? '';
    $password =$_POST['password']?? '';
    $confirm_password =$_POST['confirm_password']?? '';

    $errors=[];

    if (empty($username)) {
        $errors[]= 'username is required';
    }

    if (empty($email)) {
        $errors[]= 'Email is required';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = 'Invalid email'; 
    }

    if (empty($password)) {
        $errors[]= 'Password is required';
        
    }elseif ($password < 6){
        $errors[] ='Password must be at least 6 characters';
    }

    if ($password != $confirm_password) {
        $errors[] = 'password do not match';
    }

    // if no errors , create user
    if (empty($errors)) {
        // istantiate user
        $user = new user();

        // check if username or email already exists
        if ($username->findUserByUsername($username)){
            $errors[] ='username is already taken';
        }elseif ($user->findUserByUsername($email)){
            $errors[] = 'Email already registered';
        }else{
            $userData = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];

            if ($user->register($userData)){
                // Set success message
                $_SESSION['success_message']= 'you are now regisered! Please login';

                // redirect to login page
                header ('location'. BASE_URL.'/login.php');# http//localhost/blog/login.php
                exit;
            }else{
                $errors[] = 'something went wrong . please try';
            }
        }
    }
}
?>

<div class="auth-form">
    <h1>Register</h1>

    <?php if (isset($errors)&& !empty($errors)):?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach($errors as $error):?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="username">username</label>
            <input type="text"name = "username" id= "username" value= "<?php echo isset($_POST['username']);''?>"required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"name = "email" id= "email" value= "<?php echo isset($_POST['email']);''?>"required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="text"name = "password" id= "password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">confirm_password</label>
            <input type="password" name = "confirm_password" id= "confirm_password" required>
        </div>


        <div class="form-group">
            <button type = "submit" class="btn">register</button>
        </div>
    </form>

    <p>Already have an account? <a href="<?php echo BASE_URL;?>"></a></p>
</div>

<?php require_once 'include/footer.php'; ?>