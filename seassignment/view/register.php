<?php
include_once '../controller/register.php';
?>
<!DOCTYPE html>
<html>



    <head>
        <title>Register</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>



    <body class="text-center login-page">
        <div class="container">
            <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <img class="mb-4" src="./image/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                <p>Please fill this form to create an account.</p>

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="inputUsername" class="sr-only">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label for="inputPassword" class="sr-only">Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($email)) ? 'has-error' : ''; ?>">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>

                <div class="checkbox mb-3">
                    <p>Already have an account? <a href="../index.php">Login here</a>.</p>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
                <p class="footer mt-5 mb-3 text-muted">Copyright © 2018 W.C Company All Right Reserved.</p>
            </form> 
        </div>
    </body>
