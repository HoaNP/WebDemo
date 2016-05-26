<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Content</th>
			</tr>
		</thead>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";

// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM info";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {
				?>

				<tbody>			
					<tr>
						<td><?php echo $row['id'];
						?></td>					
						<td><?php echo $row['uname'];?></td>
						<td><?php echo $row['email'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><?php echo $row['content'];?></td>
					</tr>
				</tbody>


				<?php
			}
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
	</table>
</body>
</html>