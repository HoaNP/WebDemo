<?php
include "db/config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$content = $_POST['content'];	
	$message=''; // 
$status='success';              // Set the flag  
$sql = "INSERT INTO mydata (name, email, phone, content) VALUES ('$name','$email','$phone','$content');";
	if(!preg_match("/^[a-zA-Z ]*$/",$name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[0-9 ]*$/",$phone)){ // checking data
		$message= "Data Error";
		$status='Failed';
	}
	
	if ($status == 'Failed'){		
		die($message);
	}
	else {
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			echo json_encode(array('id' => $last_id, 'name' => $name, 'email' => $email, 'phone' => $phone, 'content' => $content));
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	
	

	?>	 