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
$category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;

echo $action . $category_id;
switch ($action) {
    case 'view_category':
        $sql = "SELECT category_follower_count from category WHERE category_id = $category_id";
        $results = getList($sql);
        foreach ($results as $result) {
            $follower_count = $result['category_follower_count'];
        }
        break;
}

$sql = "SELECT * FROM category_follower WHERE category_id = $category_id AND user_id = {$_SESSION['user_id']}";
if ($result = getData($sql)) {
    echo "<button href=#" . " id='unfollow_category' value='" . $category_id . "'>UNFOLLOW Category</button>";
} else {
    echo "<button href=#" . " id='follow_category' value='" . $category_id . "'>Follow Category</button>";
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

                $("#follow_category").on("click", function () {
                    var category_id = $(this).val();
                    alert(category_id);
                    $.get(
                            '../controller/follow_category.php',
                            {category_id: category_id},
                            );
                    location.reload();
                });
                $("#unfollow_category").on("click", function () {
                    var category_id = $(this).val();
                    alert(category_id);
                    $.get(
                            '../controller/unfollow_category.php',
                            {category_id: category_id},
                            );
                    location.reload();
                });

            }
            );

        </script>

    </body>

</html>