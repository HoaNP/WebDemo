<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>

	<style>
		table { 
			color: #333;
			font-family: Helvetica, Arial, sans-serif;
			width: 1300px; 
			border-collapse: 
			collapse; border-spacing: 0; 
		}

		td, th { 
			border: 1px solid transparent; /* No more visible border */
			height: 40px; 
			transition: all 0.3s;  /* Simple transition for hover effect */
		}

		th {
			background: #DFDFDF;  /* Darken header a bit */
			font-weight: bold;
			text-align: center;
		}

		td {
			background: #FAFAFA;
			text-align: center;
		}

		/* Cells in even rows (2,4,6...) are one color */ 
		tr:nth-child(even) td { background: #F1F1F1; }   

		/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
		tr:nth-child(odd) td { background: #FEFEFE; }  

		tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
	</style>
</head>
<body>
	
	<?php
	include "config.php";
	$sql    = "SELECT * FROM mydata";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<table style='border: solid 1px black;'><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Content</th></tr>";
    // output data of each row
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["content"] . "</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	}
	$conn->close();
	?>


</body>
</html>