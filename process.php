<?php
include "db/config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$content = $_POST['content'];	
	$message=''; // 
$status='success';              // Set the flag  
$sql = "INSERT INTO mydata (name, email, phone, content) VALUES ('$name','$email','$phone','$content');";
	if(!preg_match("/^[a-zA-Z ]*$/",$name)){
		$status='Failed';
		$message = "Only letters and white space allowed";
	} 
	if( !filter_var($email, FILTER_VALIDATE_EMAIL)){
		$status='Failed';
		$message = "Invalid email format";		
	} 
	if( !preg_match("/^[0-9 ]*$/",$phone)){ // checking data
		$message= "Only numbers allowed";
		$status='Failed';
	}
	
	if ($status == 'Failed'){	
				
		http_response_code(404);
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