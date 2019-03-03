<?php

    date_default_timezone_set('America/Halifax');
    if(isset($_SESSION["username"])){
        $cookie_name =md5($_SESSION["username"]);
    }
    if(isset($_SESSION["username"])){
    $cookie_value=time();
    }
    $day = time() + (86400 * 30) ;
    setcookie($cookie_name,$cookie_value, $day) ;

    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 
        <!--Create a title of the page-->
        <title><?php echo $pageTitle ?></title>
        <?php include _DIR_. "../../includes/db.php";?>
    </head>
    <body>
    	<header>
            <?php
                    echo '<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                        <ul class="navbar-nav" >
                        <li';  
                        if($pageTitle == 'index'){ 
                            echo ' class="nav-item active"';
                        }
                        else{
                            echo ' class="nav-item"';
                    }
                    echo'><a class="nav-link" href="/A3/index.php" >Home</a>
                        </li>
                        <li';  
                        if($pageTitle == 'my-courses'){
                         echo ' class="nav-item active"';
                        }
                        else{
                            echo ' class="nav-item"';
                        }   
                        echo '><a class="nav-link" href="/A3/my-courses.php" >My course</a>
                        </li>
                        <li'; 
                        if($pageTitle == 'report')
                        { echo ' class="nav-item active"';
                        }
                        else{
                            echo ' class="nav-item"';}
                    echo'><a class="nav-link" href="/A3/report.php" >Report issue</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Course Admin                          
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/A3/admin/manage-courses.php">Manage courses</a>
                            <a class="dropdown-item" href="/A3/admin/manage-courses.php?add=1">add courses</a>
                          </div>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Course Posts                          
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/A3/admin/manage-cposts.php">Manage courses details</a>
                            <a class="dropdown-item" href="/A3/admin/manage-cposts.php">add courses details</a>
                          </div>
                        </li>                        
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">'
                          .$_SESSION["username"].'                           
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/A3/includes/logout.php">logout</a>
                          </div>
                        </li>
                        </ul>   
                    </nav>';
            ?>		
    	</header>	