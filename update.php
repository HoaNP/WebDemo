<?php
include "db/config.php";
$id=$_POST['id'];	
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$content = $_POST['content'];
$message=''; // 
$status='success';              // Set the flag  
	// if(!preg_match("/^[a-zA-Z ]*$/",$name){ // checking data
	// 	$message= "Data Error";
	// 	$status='Failed';
	// }

// $sql = "UPDATE mydata SET name = '$name', email ='$email',phone='$phone',content='$content' where id = '$id';";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
if(!preg_match("/^[a-zA-Z ]*$/",$name){ // checking data
		$message= "Data Error";
		$status='Failed';
	}

 	if($status<>'Failed'){  // Update the table now
 		$sql = "UPDATE mydata SET name = '$name', email ='$email',phone='$phone',content='$content' where id = '$id';";
 		$stmt = $conn->prepare($sql);
 		//$stmt->execute();
 		if($stmt->execute()){
 			$no=$count->rowCount();
 			$message= " $no  Record updated<br>";
 		}else{
 			$message = print_r($dbo->errorInfo());
 			$message .= ' database error...';
 			$status='Failed';
 		}
 	}


?>	 