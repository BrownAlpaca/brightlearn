<?php
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$success=false;
$handle = fopen("db/users.csv", "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	if($data[0] == $username && $data[2] == $password){
    		$success=true;
    		break;
    	}
    }
    fclose($handle);
    if($success){
		session_start();
    	$_SESSION["username"] = $data[0];
    	$_SESSION["status"]="login";
        if($_SESSION["username"]=="admin"){
            $_SESSION["type"]="0";
        }
        else if($_SESSION["username"]=="yoda"||$_SESSION["username"]=="luke"){
            $_SESSION["type"]="1";
        }
        else{
            $_SESSION["type"]="2";
        }
    	header("Location: index.php");
    }
    else{
    	header("Location: index.php?loginError=1");
    }
?>
