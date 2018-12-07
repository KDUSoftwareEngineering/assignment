<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
require_once '../controller/check_admin.php';
require_once '../controller/user_control.php';
?>
<!DOCTYPE html>
<html>

    <head>
        <title>User Control</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>
    <body>
        <div class="container">
            <h1>User Waiting For Approve List</h1>
            <table class="table-responsive table table-hover table-bordered">
                <thead>
                <th>User ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($results as $result) {
                            $userID = $result['user_id'];
                            $username = $result['username'];
                            $name = $result['name'];
                            $email = $result['email'];
                            echo "<tr>";
                            echo "<td>" . $userID . "</td>";
                            echo "<td>" . $username . "</td>";
                            echo "<td>" . $name . "</td>";
                            echo "<td>" . $email . "</td>";
                            echo "<td><a href=" . "admin_edit_user.php?action=editUser&userID=$userID>" . "EDIT</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <body>
</html>