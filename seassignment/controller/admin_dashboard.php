<?php

define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';


$sql = "SELECT COUNT(user_id) AS total_member FROM user WHERE role='member';";

$results = getData($sql);


