<?php
require_once ('../controller/insert.php');
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Insert Event</title>
        <?php
        include('../controller/head.php');
        ?>
    </head>
    <body>
        <div class="container">
            <h2>Event</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label>Event Name:</label>
                    <input type="text" class="form-control" name="EventName" value="">
                </div>
                <div class="form-group date" data-provide="datepicker">
                    <label>Date:</label>
                    <input type="text" class="form-control" name="Date" value="">
                </div>
                <div class="form-group">
                    <label>Time:</label>
                    <input type="text" class="form-control" name="Time" value="">
                </div>
                <div class="form-group">
                    <label>Venue:</label>
                    <input type="text" class="form-control" name="Venue" value="">
                </div>
                <div class="form-group">
                    <label>Slot Limit:</label>
                    <input type="text" class="form-control" name="SlotLimit" value="">
                </div>
                <input type="submit" class="btn btn-submit" value="Submit">

            </form>
        </div>
        <script type="text/javascript">
            $('.datepicker').datepicker({
                startDate: '-3d'
            });
        </script>
    </body>
</html>