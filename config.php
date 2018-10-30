<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DIR_APPLICATION', '/home/limkokheng/public_html/wc/catalog/');
// define('DIR_SYSTEM', '/home/limkokheng/public_html/wc/system/');
define('DIR_IMAGE', '/home/limkokheng/public_html/wc/image/');
define('DIR_LANGUAGE', '/home/limkokheng/public_html/wc/catalog/language/');
// define('DIR_CONFIG', '/home/limkokheng/public_html/wc/system/config/');
// define('DIR_CACHE', '/home/limkokheng/public_html/wc/system/storage/cache/');
// define('DIR_DOWNLOAD', '/home/limkokheng/public_html/wc/system/storage/download/');
// define('DIR_LOGS', '/home/limkokheng/public_html/wc/system/storage/logs/');
// define('DIR_MODIFICATION', '/home/limkokheng/public_html/wc/system/storage/modification/');
// define('DIR_UPLOAD', '/home/limkokheng/public_html/wc/system/storage/upload/');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'seassignment');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

/**
 * get single result
 *
 * @param string $sql
 * @return array|null
 */
function getData($sql = '') {
    global $conn;

    $query = mysqli_query($conn, $sql);

    return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

/**
 * get multiplee result
 *
 * @param string $sql
 * @return array|null
 */
function getList($sql = '') {
    global $conn;

    $query = mysqli_query($conn, $sql);

    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

?>