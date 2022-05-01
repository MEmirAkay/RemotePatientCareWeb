<?php

$servername = "localhost";
$username = "musta194_admindb";
$password = "@dmin1907";
$dbname = "musta194_webtek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn -> set_charset("utf8");

?>
