<?php
// Initialize the session
session_start();
define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$sql = "SELECT * FROM user WHERE role = 'member' AND status_id = 1";
$results = getList($sql);
foreach ($results as $result) {
    $name = $result['name'];
    $user_id = $result['user_id'];
    echo "<a href=" . "other_profile.php?action=view_profile&user_id=" . $user_id . ">" . $name . "</a>";
    echo $name;
}

$sql1 = "SELECT * FROM user WHERE user_id = {$_SESSION['user_id']}";
$results = getList($sql1);
foreach ($results as $result) {
    $name = $result['name'];
    $email = $result['email'];
    $follower_count = $result['follower_count'];
    $join_date = date("d-m-Y", strtotime($result['create_date_time']));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>
    <body>
        <div class="page-header">
            <h1>Welcome back, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        </div>
        <p>
            <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="../controller/logout.php" class="btn btn-danger">Sign Out of Your Account</a>
            <a href="user_control.php" class="btn btn-default">User Control</a>
        </p>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="information">
                        <div class="row text-center">
                            <div class="col-12">
                                <strong><span><?php echo $name; ?></span></strong>
                            </div>
                            <div class="col-6">
                                <span>Email<br><?php echo $email; ?></span>
                            </div>
                            <div class="col-6">
                                <span>Join Date<br><?php echo $join_date; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4">
                            <div class="box">
                                34<br>POST
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box">
                                67<br>TOTAL LIKES
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box">
                                <strong><?php echo $follower_count ?></strong><br>FOLLOWER(s)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    ?>
</html>