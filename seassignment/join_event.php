<html>
<head>

<link rel="stylesheet" href="resource/css/style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seassignment";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


mysqli_select_db($conn,"event");
 

$sql= "SELECT * FROM event";
$event_joined = "SELECT * FROM event_joined";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			$get_user_query = "SELECT name FROM user WHERE user_id=".$row['user_id'];
			$get_user = $conn->query($get_user_query);
			$get_username = mysqli_fetch_assoc($get_user);
	echo "<div class='blog-container'>
			<div class='blog-header'>
			<div class='blog-author--no-cover'>
				<h3>".$get_username['name']."</h3>
			</div>
			</div>

			<div class='blog-body'>
			<div class='blog-title'>
			<h1>".$row['event_name']."</h1>
			</div>
			<div class='blog-summary'>
				<p>Date: " . $row['date']."</br>".
					"Time: " . $row['time']."</br>".
					"Venue: " . $row['venue']."</br>".
					"Slot Limit: ".$row['slot_limit']."<br></p>";
					
				$print_joined_query = "SELECT * FROM event_joined WHERE event_id =".$row["event_id"];
				$print_joined = $conn->query($print_joined_query);
					echo "Joined User: ";
					if ($print_joined->num_rows > 0) {
						while($event_row = $print_joined->fetch_assoc()){
							$print_user_query = "SELECT name FROM user WHERE user_id=".$event_row["user_id"];
							$print_user = $conn->query($print_user_query);
							$user_name = mysqli_fetch_assoc($print_user);
							echo $user_name["name"]."<br>";
						}
					}else{
						echo "No user joined yet";
					}
			echo"<div class='join'>
					<a class='btn' href ='joined.php?action=joinevent&event_id=".$row["event_id"]."'>Join</a>
				</div>
			</div>
			</div>
		</div>";
        
		
    }
	
} else {
    echo "0 results";
}

$conn->close();

?>

</body>

</html>
			