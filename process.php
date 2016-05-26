<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$content = $_POST['content'];
	$sql = "INSERT INTO ContactInfo VALUES (NULL,'$name','$email','$phone','$content');";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>	 