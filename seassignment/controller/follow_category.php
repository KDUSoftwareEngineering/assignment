<?php

session_start();
define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';
$category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;
//$userId = 4;

if ($userId !== $_SESSION['user_id']) {
    $sql = "UPDATE `category` SET `category_follower_count` = category_follower_count + 1 WHERE category_id = $category_id ";
    if (mysqli_query($conn, $sql)) {
        echo "Follow Successful";
    } else {

        echo "Error follow: " . mysqli_error($conn);
    }

    $sql = "INSERT INTO category_follower (category_id, user_id) VALUES ($category_id, {$_SESSION['user_id']})";
    mysqli_query($conn, $sql);
} else {
    echo "You cannot follow yourself.";
}
    
