<?php
include "./connection.php";

$JsonReceiver = file_get_contents('php://input');

$q = $_REQUEST["q"];

if ($q == "command") {

    $sql = "SELECT * FROM command";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $resp = $row;

}

echo json_encode($resp);

mysqli_close($conn);







