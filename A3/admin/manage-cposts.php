<?php
	session_start();
	$pageTitle = 'MCposts';

	if($_SESSION["type"]=="0"){
		 	include "includes/header.php";
	}
	else if($_SESSION["type"]=="1")
		include "includes/header.php";
	else{
		header("Location: ../index.php?attempt=unauthorized_access");
	}
?>
<?php
	include "../includes/db.php";
?>
<?php	
		include "includes/footer.php";
?>