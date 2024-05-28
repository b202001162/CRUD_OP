<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_operation";
$connection = new mysqli($servername, $username, $password, $dbname);
// validate the database connection
if($connection->connect_error) {
die("Connection failed with database: " . $connection->connect_error);
}