<?php

define('DIR_CONFIG', '../seassignment');
require_once $_SERVER['DOCUMENT_ROOT'] . DIR_CONFIG . '/config.php';

$sql = "SELECT * FROM category";

$results = getList($sql);

