<?php
//Deleted update
 
$connect = mysqli_connect("localhost","root","","urlUploader");

$json = file_get_contents('php://input');
$obj = json_decode($json);
$urlId = $obj->id;

var_dump($urlId);

$sql = "UPDATE tbl_url SET deleted=0 WHERE id=$urlId";

if ($connect->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connect->error;
}

$connect->close();
 
?>