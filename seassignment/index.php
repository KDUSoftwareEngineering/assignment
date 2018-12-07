<?php
include_once 'controller/login.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="resource/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="resource/css/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="resource/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" type="text/css" href="resource/css/stylesheet.css">
        <script type="text/javascript" src="resource/js/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="resource/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="resource/css/font-awesome/css/font-awesome.min.css">
    </head>

    <body class="text-center login-page">
        <div class="container">
            <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <img class="mb-4" src="./images/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="checkbox mb-3">
                    <p>Don't have an account? <a href="view/register.php">Sign up now</a>.</p>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="footer mt-5 mb-3 text-muted">Copyright © 2018 W.C Company All Right Reserved.</p>
            </form>
        </div>
    </body>
</html>