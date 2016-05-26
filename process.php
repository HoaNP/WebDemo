<?php
	include "config.php";
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$content = $_POST['content'];
	$sql = "INSERT INTO mydata VALUES (NULL,'$name','$email','$phone','$content');";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>	 