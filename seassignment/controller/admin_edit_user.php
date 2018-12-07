<?php

define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$userID = isset($_REQUEST['userID']) ? $_REQUEST['userID'] : null;

//echo $action . "<br>" . $userID;
//
//switch ($action) {
//    case 'approveUser':
//
//        $sql = ("UPDATE user SET status_id = 1 WHERE user_id={$userID};");
//
//
//        if (mysqli_query($conn, $sql) or die(mysqli_error($conn))) {
//            echo "UserID ". $userID . " have been approve";
//        } else {
//            echo "Error updating record: " . mysqli_error($conn);
//        }
//
//        break;
//
//    default:
//        echo "no such action";
//        break;
//}


if ($action == 'editUser') {
    $sql = "SELECT * FROM user user_t LEFT JOIN status status_t ON user_t.status_id = status_t.status_id WHERE user_id = {$userID};";
    $results = getList($sql);
    foreach ($results as $result) {
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        $status = $result['status'];
        $status_id = $result['status_id'];
        $user_id = $result['user_id'];
        $username = $result['username'];
        echo $status . $status_id;
    }

}

$p_status = $p_username = $p_userid = "";

if(isset($_POST['submit'])) {

    $p_status = $_POST["status"];
    $p_username = $_POST["username"];
    $p_userid = $_POST['userid'];
    echo $p_status.$p_userid.$p_username;
    $sql = ("UPDATE user SET status_id = {$p_status} WHERE user_id = {$p_userid};");
    if (mysqli_query($conn, $sql) or die(mysqli_error($conn))) {
        echo "UserID " . $p_username . " have been updated";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>