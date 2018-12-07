<html>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seassignment";

session_start();

$event_id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : null;

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

mysqli_select_db($conn,"event");
 echo $event_id;
mysqli_query($conn, "UPDATE event 
			SET slot_limit = slot_limit -1 
				WHERE event_id = ".$event_id); 
				
mysqli_query($conn,"INSERT INTO event_joined (event_id,user_id)
	VALUES (".$event_id.",".$_SESSION['user_id'].")" );







$conn->close();

?>

</body>

</html>