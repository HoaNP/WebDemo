<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Home</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="admin.php">Admin</a></li>				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="active" onclick="document.getElementById('id01').style.display='block'" style="width:auto;""><a href="#">Contact</a></li>
				<!-- <li><a href="#"><span class="glyphicon glyphicon-envelope" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" ></span></a></li> -->
				
			</ul>
		</div>
	</nav>

	<h2>Contact form</h2>

	
	<div id="id01" class="modal">

		<form class="modal-content animate" action="">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				
			</div>

			<div class="container">
				<h1>Contact Us</h1>
				<label><b>Name</b></label>
				<input type="text" placeholder="Please enter your name" name="uname" required>

				<label><b>Email</b></label>
				<input type="text" placeholder="Please enter your e-mail" name="email" required>

				<label><b>Phone</b></label>
				<input type="text" placeholder="Please enter phone number" name="phone">

				<label><b>Content</b></label>
				<br>

				<textarea placeholder="Please enter your content" name="content" rows="4" cols="50"></textarea>
				<br><br>

				<button class="button send">Send</button>				
			</div>

			
		</form>
	</div>

	<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
</script>

</body>
</html>
