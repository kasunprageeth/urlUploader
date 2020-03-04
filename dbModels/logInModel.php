<?php
//logIn User

$connect = mysqli_connect("localhost","root","","urlUploader");
$data = json_decode(file_get_contents("php://input"));
session_start();

$email = $data -> email;
$password = $data -> password;
 $response = [];

$query = "SELECT * FROM `tbl_user` WHERE `email`='$email' AND `password`='$password'";
$result = mysqli_query($connect,$query);

if (mysqli_num_rows($result) > 0) {
	
	 $response['status'] = 	'logedIn';
	 $response['email'] = 	$email;
	$_SESSION['email']=$email;
 }else{
	 $response['status'] = 	'error';
 }
 echo json_encode($response);
  $connect->close();
?>