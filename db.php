<?php
	include "config.php";
		// sql to create table
	$sql = "CREATE TABLE MyData (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	content NVARCHAR(300) NOT NULL)";

	if ($conn->query($sql) === TRUE) {
		echo "Table MyData created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
?>	 