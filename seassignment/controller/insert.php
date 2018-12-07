<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seassignment";

session_start();
$eventname = $date = $time = $venue = $slot_limit = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
if (!empty($_POST['EventName'])) {
	$eventname = trim($_POST['EventName']);
} else {
	echo "cannot be empty";
}
if (!empty($_POST['Date'])) {
	$date = trim($_POST['Date']);
} else {
	echo "cannot be empty";
}
if (!empty($_POST['Time'])) {
	$time = trim($_POST['Time']);
} else {
	echo "cannot be empty";
}
if (!empty($_POST['Venue'])) {
	$venue = trim($_POST['Venue']);
} else {
	echo "cannot be empty";
}
if (!empty($_POST['SlotLimit'])) {
	$slot_limit = trim($_POST['SlotLimit']);
} else {
	echo "cannot be empty";
}
echo $eventname.$date.$time.$venue.$slot_limit;
if($eventname !== '' && $date!== '' && $time!== '' && $venue!== '' && $slot_limit!== ''){
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

mysqli_select_db($conn,"event");
 
$sql= "INSERT INTO event (event_name,user_id,date,time,venue,slot_limit)
VALUES
('$eventname',".$_SESSION['user_id'].",'$date','$time','$venue','$slot_limit ')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}else{
	echo "Insert failed";
}
}
// Create connection


?>

</body>

</html>