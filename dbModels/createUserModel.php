<?php
//create user

$connect = mysqli_connect("localhost","root","","urlUploader");
$data = json_decode(file_get_contents("php://input"));


// $dupe = mysql_query("SELECT * FROM tbl_user WHERE email='$url'") or die (mysql_error());
// $num_rows = mysql_num_rows($dupe);
// if ($num_rows > 0) {
// echo 'Error! Already on our database!';
// }
// else {
//  echo 'done!';
// }

 $first_name = $data -> firstName;
 $last_name = $data -> lastName;
 $email = $data -> email;
 $password = $data -> password;


 $query = "INSERT INTO tbl_user(first_name,last_name,email,password)VALUES(
 							'$first_name',
 							'$last_name',
 							'$email',
 							'$password'	
 						)";
if ($connect->query($query) === TRUE) {
	echo "User create success.";
}else{
	echo "kelawelaa...";
}
 $connect->close();
?>