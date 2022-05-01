<?php
include "./connection.php";

$JsonReceiver = file_get_contents('php://input');

$q = $_REQUEST["q"];

if ($q == "data") {

    $sql = "SELECT * FROM sensordata";
    $result = mysqli_query($conn, $sql);
    header("Content-Type: JSON");
    
    $resp = array();

while ($row = mysqli_fetch_assoc($result)) {

    $resp[] = $row;

}

$respJson = json_encode($resp);
echo $respJson;

mysqli_close($conn);

}






