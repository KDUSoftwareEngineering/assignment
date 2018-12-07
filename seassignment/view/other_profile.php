<?php
// Initialize the session
session_start();
define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$userId = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : null;

echo $action . $userId;
switch ($action) {
    case 'view_profile':
        $sql = "SELECT follower_count from user WHERE user_id = $userId";
        $results = getList($sql);
        foreach ($results as $result) {
            $follower_count = $result['follower_count'];
        }
        break;
}

$sql = "SELECT * FROM follower WHERE follower_user_id = $userId AND user_id = {$_SESSION['user_id']}";
if ($result = getData($sql)) {
    echo "<button href=#" . " id='unfollow' value='" . $userId . "'>UNFOLLOW</button>";
} else {
    echo "<button href=#" . " id='follow' value='" . $userId . "'>Follow Him</button>";
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
        <p>Follower</p>
        <?php echo $follower_count; ?>
        <?php
        ?>

        <script type="text/javascript">

            $(function () {

                $("#follow").on("click", function () {
                    var userId = $(this).val();
                    alert(userId);
                    $.get(
                            '../controller/follow.php',
                            {user_id: userId},
                            );
                    location.reload();
                });
                $("#unfollow").on("click", function () {
                    var userId = $(this).val();
                    alert(userId);
                    $.get(
                            '../controller/unfollow.php',
                            {user_id: userId},
                            );
                    location.reload();
                });

            }
            );

        </script>

    </body>

</html>