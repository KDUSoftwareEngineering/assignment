<?php
require_once '../controller/admin_edit_user.php';
require_once '../controller/check_admin.php';
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Admin Edit User</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>
    <body>
        <form action="controller/admin_edit_user.php" method="POST">
            <div class="form-group row">
                <label class="col-2 text-right">User ID</label>
                <input type="text" name="userid" class="form-control col-10" value="<?php echo $user_id;?>" readonly>
            </div>
            <div class="form-group row">
                <label class="col-2 text-right">Username</label>
                <input type="text" name="username" class="form-control col-10" value="<?php echo $username;?>" readonly>
            </div>
            <div class="form-group row text-right">
                <label class="col-2 text-right">Status</label>
                <select class="form-control col-10" name="status">
                    <?php
                    if ($status_id == 0) {
                        echo "<option value=" . "1>" . "Enable" . "</option>";
                        echo "<option selected value=" . "0>" . $status . "</option>";
                    } else if ($status_id == 1) {
                        echo "<option selected value=" . "1>" . $status . "</option>";
                        echo "<option value=" . "0>" . "Disable" . "</option>";
                    } else {
                        echo "ERROR";
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </div>
        </form>
    </body>
</html>