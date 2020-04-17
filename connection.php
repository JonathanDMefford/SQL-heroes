<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sqlheroes";
$GLOBALS["conn"] = null;

$conn = new mysqli($servername, $username, $password, $dbname);
$GLOBALS["conn"] = $conn;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>