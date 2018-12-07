<?php

// Initialize the session
// Include config file
define('DIR_CONFIG', '../seassignment/');
define('ROOT_URL', '../seassignment/');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';


//$sql = "SELECT * FROM user WHERE status_id = 0;";
$sql = "SELECT * FROM user WHERE role = 'member';";
//$results = mysqli_query($conn, $sql);
$results = getList($sql);

?>