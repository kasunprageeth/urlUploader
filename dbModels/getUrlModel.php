<?php
//select.php

$connect = mysqli_connect("localhost","root","","urlUploader");
$output = array();
session_start();
$userId = $_SESSION['id'];


$query = "SELECT `id`,`url`,`title`,`visit`,`dataAndTime`,`deleted` FROM `tbl_url` WHERE `userID` = $userId";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) >0){
	while ($row = mysqli_fetch_array($result))
	{
		$output[] = $row;
	}

	echo json_encode($output);	 
}
 
?>