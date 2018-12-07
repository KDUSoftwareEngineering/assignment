<?php

function getConnection() {
    try {
        //Establishing connection to the database
        $connection = new PDO("mysql:host=localhost; dbname=seassignment", "root", "");

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    } catch (Exception $e) {
        //If there is an error in establishing connection
        throw new Exception("Connection error " . $e->getMessage(), 0, $e);
    }
}

?>
