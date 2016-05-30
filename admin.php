<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">	
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/global.js"></script>
</head>
<body>
	
	<?php
	include "db/config.php";
	$sql    = "SELECT * FROM mydata";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		?>
		<table style='border: solid 1px black;' id ="myTable">
		<?php 
		echo "<div id=\"msgDsp\" STYLE=\"position: absolute; right: 0px; top: 10px;left:800px;text-align:left; FONT-SIZE: 12px;font-family: Verdana;border-style: solid;border-width: 1px;border-color:white;padding:0px;height:20px;width:250px;top:10px;z-index:1\"> Edit mark </div><br><br>";
		 echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Content</th><th>Action</th></tr>";
    // output data of each row
		while ($row = $result->fetch_assoc()) {
		
			
			?>
			<td class = "c_id"><?php echo $row["id"];?></td>
			<td class = "c_Name"><?php echo $row["name"];?></td>
			<td class = "c_Email"><?php echo $row["email"];?></td>
			<td class = "c_Phone"><?php echo $row["phone"];?></td>
			<td class = "c_Content"><?php echo $row["content"];?><td>
			
			<a class="editable" href="#">Edit</a> <a class="edit" href="#">Delete</a>
			<?php 
			echo "</></tr>";
		}
		?>

		</table>
		<?php
	} else {
		echo "0 results";
	}
	$conn->close();
	?>
	

</body>
</html>