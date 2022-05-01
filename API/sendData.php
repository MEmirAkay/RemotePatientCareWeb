<?php
include "connection.php";
$JsonReceiver = file_get_contents('php://input');

$obj = json_decode($JsonReceiver);

$serum = $obj -> serum;
$light = $obj -> light;
$temperature = $obj -> temperature;


$sql = "INSERT INTO sensordata (serum,light,temperature) VALUES('$serum','$light','$temperature')";


mysqli_query($conn, $sql);
mysqli_close($conn);

echo $serum;

?>