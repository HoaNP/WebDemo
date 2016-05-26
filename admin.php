<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	// try {
	// 	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 //    // set the PDO error mode to exception
	// 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 //    // sql to create table
	// 	$sql = "CREATE TABLE INFO (
	// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	// 	uname NVARCHAR(30) NOT NULL,
	// 	email NVARCHAR(50) NOT NULL,
	// 	phone NVARCHAR(50) NOT NULL,
	// 	content NVARCHAR(500)
	// 	)";

 //    // use exec() because no results are returned
	// 	$conn->exec($sql);
	// 	echo "Table INFO created successfully";
	// }
	// catch(PDOException $e)
	// {
	// 	echo $sql . "<br>" . $e->getMessage();
	// }
	$name = test_input($_POST["uname"]);
	echo($name);
	$conn = null;
	?>
</body>
</html>