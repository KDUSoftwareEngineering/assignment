<?php

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: view/profile.php");
    exit;
}

// Include config file
define('DIR_CONFIG', '../seassignment/');
define('ROOT_URL', '../seassignment/');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {

        // get user info from database by using username
        $user_info = getData("SELECT * FROM user WHERE username = '" . mysqli_escape_string($conn, $username) . "'");
//        echo "<pre>";
//        var_dump($user_info);
//        echo "</pre>";
//        exit();

        if (!empty($user_info)) {
            switch ($user_info['status_id']) {
                case 0:
                    echo "<script>alert('Your Account Haven Approve Yet / You Haven Sign Up');";
                    echo '</script>';
                    break;
                case 1:
                    if (password_verify($password, $user_info['password'])) {
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["user_id"] = $user_info['user_id'];
                        $_SESSION["username"] = $username;

                        if ($user_info['role'] == 'admin') {
                            $_SESSION['user'] = $user_info['role'];
                            $_SESSION['success'] = "You are now logged in";
                            header('location: ' . ROOT_URL . 'view/admin.php');
                        } else if ($user_info['role'] == 'member') {
                            $_SESSION['user'] = $user_info['role'];
                            $_SESSION['success'] = "You are now logged in";
                            header("location:" . ROOT_URL . "view/profile.php");
                        } else {
                            echo "Please Contact Admin";
                        }
                    } else {
                        // Display an error message if password is not valid
                        $password_err = "The password you entered was not valid.";
                    }
                    break;
                case 2:
                    echo "<script>alert('Your Account Have Been Blocked.');";
                    echo '</script>';
                    break;
            }
        } else {
            echo "<script>alert('Something Wrong Please Contact Admin');";
            echo '</script>';
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>