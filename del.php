<?php
include "db/config.php";
$id=$_POST['id'];	
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$content = $_POST['content'];
$message=''; // 
$status='success';              // Set the flag  
$sql = "DELETE FROM mydata where id = '$id';";
$stmt = $conn->prepare($sql);
$stmt->execute();



?>	 