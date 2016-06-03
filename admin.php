<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">	
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">	

	<script src="js/global.js"></script>
</head>
<body>
	<div id="id01" class="modal">
		<!-- <div class="modal-dialog modal-sm"> -->
		<form class="modal-content animate" id ="modal" action="">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

			</div>

			<div class="container">				
				<h1>Add data</h1>
				<label><b>Name</b></label>
				<input type="text" placeholder="Please enter your name" name="name" id="txt_name" required>		
				<br>			
				<label><b>Email</b></label>
				<input type="text" placeholder="Please enter your e-mail" name="email" id = "txt_email" required>
				<br>
				<label><b>Phone</b></label>
				<input type="text" placeholder="Please enter phone number" name="phone" id = "txt_phone" required>
				<br>
				<label><b>Content</b></label>
				<br>
				<textarea placeholder="Please enter your content" name="content" rows="4" cols="50" id = "txt_content" required></textarea>
				<br><br>
				<button class="btn" >Send</button>
				<br><br>
			</div>
		</form>
		<!-- </div> -->
	</div>

	<?php
	include "db/config.php";
	$sql    = "SELECT * FROM mydata";
	$result = $conn->query($sql);
	
	?>
	<button class="btnadd" style="width:120px;" >Add</button><br>
	<br>
	<table style='border: solid 1px black;' id ="myTable">
		<?php 

		echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Content</th><th>Action</th></tr></thead>";
    		// output data of each row
		echo "<tbody>";
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				?>
				<tr>
					<td class = "c_id"><?php echo $row["id"];?></td>
					<td class = "c_Name"><?php echo $row["name"];?></td>
					<td class = "c_Email"><?php echo $row["email"];?></td>
					<td class = "c_Phone"><?php echo $row["phone"];?></td>
					<td class = "c_Content"><?php echo $row["content"];?></td>
					<td><a class="editable" href="#">Edit</a> <a class="edit" href="#">Delete</a></td>
				</tr>
				<?php 					
			}
		}
		echo "</tbody>";
		?>

	</table>
	<?php


	$conn->close();
	?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>