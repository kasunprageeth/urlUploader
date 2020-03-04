<?php
//insart data

$connect = mysqli_connect("localhost","root","","urlUploader");
$data = json_decode(file_get_contents("php://input"));

var_dump($data->email);
session_start();

    $userEmail = $data->email;

   $query1 = "SELECT * FROM `tbl_user` WHERE `email` = '$userEmail'";
   $result =  mysqli_query($connect, $query1);

   while($row = mysqli_fetch_assoc($result)) {
 		$_SESSION['id'] = $row["id"];
 	}
   $userId = $_SESSION['id'];

 	 $eotm = $data->url;
	 for($i = 0; $i <= sizeof($eotm)-1; $i++) {
	 	$requestData = [
	 		'url' => $eotm[$i]->url,
	 		'title' => $eotm[$i]->title,
	 		'visit' => $eotm[$i]->isVisited,
	 		'deleted' => $eotm[$i]->isDelited,
	 		'dataAndTime' => $eotm[$i]->createdDate
	 	];

		$userID = $userId;
	 	$url = $requestData['url'];
	 	$title = $requestData['title'];
	 	$visit = $requestData['visit'];
	 	$deleted = $requestData['deleted'];
	 	$dataTime = $requestData['dataAndTime'];

	 	$query = "INSERT INTO tbl_url(userID,url,title,visit,deleted,dataAndTime)VALUES(
			 						'$userID',
	 								'$url',
	 								'$title',
	 								'$visit',
	 								'$deleted',
									'$dataTime'	
	 							)";

	 	if(mysqli_query($connect, $query))
	 	{
	 		echo "Url upload success.";
	 	}else{
	 		echo "kelawelaa...";
	 	}
	 } 

?>