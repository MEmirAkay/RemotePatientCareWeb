<?php
include "connection.php";
$JsonReceiver = file_get_contents('php://input');

$q = $_REQUEST["command"];


if ($q) {

    $sql = "UPDATE command SET command='$q' ";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
}

?>