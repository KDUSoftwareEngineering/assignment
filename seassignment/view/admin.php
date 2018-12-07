<?php
// Initialize the session
session_start();

require_once '../controller/check_admin.php';
require_once '../controller/admin_dashboard.php';
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>
    <body>
        <div class="page-header">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>Welcome Admin</h1>
        </div>
        <p>
            <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="../controller/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            <a href="admin_register.php" class="btn btn-default">Register For New Admin</a>
            <a href="user_control.php" class="btn btn-default">User Control</a>
        </p>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <?php echo $results['total_member']; ?>
                </div>
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    
                </div>
            </div>
        </div>
    </body>
</html>