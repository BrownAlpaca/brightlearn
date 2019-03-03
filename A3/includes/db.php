<?php
	$host="localhost";
	$username="root";
	$password="root";
	$database="2170";
	$conn=mysqli_connect($host,$username,$password,$database);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
?>