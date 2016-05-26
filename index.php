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
			</ul>
		</div>
	</nav>

	<div id="id01" class="modal">

		<form class="modal-content animate" action="">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

			</div>

			<div class="container">
				<h1>Contact Us</h1>
				<label><b>Name</b></label>
				<input type="text" placeholder="Please enter your name" name="name" id="txt_name" required>					
				<label><b>Email</b></label>
				<input type="text" placeholder="Please enter your e-mail" name="email" id = "txt_email" required>
				<label><b>Phone</b></label>
				<input type="text" placeholder="Please enter phone number" name="phone" id = "txt_phone" required>
				<label><b>Content</b></label>
				<br>
				<textarea placeholder="Please enter your content" name="content" rows="4" cols="50" id = "txt_content" required></textarea>
				<br><br>
				<button class="btn" onclick="Send()">Send</button>
			</div>
		</form>
	</div>
	<form onload="myFunction()" style="margin:0;">

		<div id="loader"></div>

		<div style="display:none;" id="myDiv" class="animate-bottom">
			<h2>Tada!</h2>
			<p>Loading..</p>
		</div>

		<script>
			var myVar;

			function myFunction() {
				myVar = setTimeout(showPage, 3000);
			}

			function showPage() {
				document.getElementById("loader").style.display = "none";
				document.getElementById("myDiv").style.display = "block";
			}
		</script>

	</form>

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
	<script>			
		// When user clicks send button	
		
		function Send(){		
			var name = $('#txt_name').val();
			var email = $('#txt_email').val();
			var phone = $('#txt_phone').val();
			var content =$('#txt_content').val();
			var postData = "&name="+name+"&email="+email+"&phone="+phone+"&content="+content;			
			if (name != '' && email != '' && phone != '' && content != ''){
				$.ajax({
					url: "process.php",
					type: "POST",
					data: postData
				});

			}


			
		}

	</script>


</body>
</html>
