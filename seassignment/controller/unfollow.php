<?php
session_start();
define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';
$userId = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;
//$userId = 4;
    echo $userId;
    
$sql = "UPDATE `user` SET `follower_count` = follower_count - 1 WHERE user_id = $userId ";
if (mysqli_query($conn, $sql)) {
    echo "Follow Successful";
} else {

    echo "Error follow: " . mysqli_error($conn);
}

$sql = "DELETE FROM follower WHERE follower_user_id = $userId AND user_id = {$_SESSION['user_id']}";
mysqli_query($conn, $sql);