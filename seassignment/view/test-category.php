<?php
// Initialize the session
session_start();

require_once '../controller/test-category.php';
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
        <?php
        foreach ($results as $result) {
            $category_id = $result['category_id'];
            $category_name = $result['category_name'];
            echo '<a href="category.php?action=view_category&category_id=' . $category_id . '">'. $category_name . '&nbsp;</a>';
        }
        ?>
        
    </body>
</html>