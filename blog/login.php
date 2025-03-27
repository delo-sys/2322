<?php

$pageTitle = 'Login';

require_once 'include/header.php';

// check if already logged in
if (isset($_SESSION['user-id'])) {
    header ('location:' . BASE_URL);
    exit;
} 

// process form submission 
if ($_SERVER['REQUEST_METHOD']=='POST'){
    // validate form
    $username= $_POST['username']??'';
    $password= $_POST['password']??'';

    $errors =[];

    if(empty($username)){
        $errors[]= 'username is required';
    }

    if(empty($password)){
        $errors[]='password is required';
    }

    // If no error , attempt Login
    if(empty($errors)){

        // attempt Login
        $loggedInUser = $user->login($username,$password);

        // check successful login
        if($loggedInUser) {
            $_SESSION['user_id']=$loggedInUser->id;
            $_SESSION['user_name']=$loggedInUser->username;
            $_SESSION['user_email']=$loggedInUser->email;
            $_SESSION['user_role']=$loggedInUser->role;

            // redirect to home page
            header ('location:' . BASE_URL);
            exit;
        }else{
            $errors[]='Invalid username or password';
        }
    }
}

?>

<div class="auth-form">
    <h1>login</h1>

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
            <label for="password">password</label>
            <input type="text"name = "password" id= "password" value= "<?php echo isset($_POST['password']);''?>"required>
        </div>

        <div class="form-group">
            <button type = "submit" class="btn">login</button>
        </div>
    </form>
    <p>Don't have an account ? <a href="<?php echo BASE_URL;?>/regiser.php">Register here </a></p>
</div>

<?php require_once 'include/footer.php'?>