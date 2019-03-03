<?php
/****************************************************************************************************
htdocs must be the parent directory of this assignment called A3. Meanwhile, the file named A3 cannot be renamed. Otherwise, this website may not run correctly.
*************************************************************************************************/
?>
<?php
	session_start();
	$pageTitle = 'index';
	if($_SESSION["type"]=="0"){
		include "admin/includes/header.php";
	}
	else{
		include "includes/header.php";
	}	
?>

<div class="container">
<div class="row">
	<div class="col-8">
		<div class="jumbotron" style="margin-top: 10px;">
			<h3>Welcome to BrightLearn!</h3>
			<p ><a href="" class="text-dark">admin</a></p>
			<?php
				echo date("d/m/Y");

			?>
			<p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi purus est, bibendum at pulvinar eget, tempus sed tortor. In tincidunt elementum ornare. Donec nulla massa, ultricies vel lorem quis, consectetur interdum felis.</p>
			<p class="text-dark">Sed suscipit lacus a orci vestibulum, id varius neque pellentesque. Proin luctus sodales odio, in commodo velit euismod a. Integer dolor velit, condimentum in ipsum sed, venenatis faucibus ligula. Mauris lobortis iaculis commodo. Nullam ac metus nec est tempor tempor sit amet non justo. Duis molestie enim id rutrum eleifend.</p>
		</div>
	</div>	
	<div class="col-4">
		
		<form action=<?php $path="login.php"; echo basename($path);?> method="post" class="bg-light" style="margin-top: 10px; padding:10px;">		


  		<?php
			if($_GET['loginError']=="1"){
				echo '<div class="form-group">
  						<label for="usr">Username:</label>
  						<input type="text" name="username" class="form-control" id="usr">
					</div>
  					<div class="form-group">
   						<label for="pwd">Password:</label>
    					<input type="password" name="password" class="form-control" id="pwd">
  					</div>
  		 			<p style="padding-top: 10px;"><a href="#">forget password</a></p>
  					<button type="submit" class="btn btn-primary">log in</button>
					<h6 class="text-danger">*wrong password or username</h6>';
			}
			else if($_SESSION["status"]=="login"){
				date_default_timezone_set('North America/Halifax');
				if(isset($_COOKIE[$cookie_name])){
					$last = $_COOKIE[$cookie_name]; 
					if (isset ($last))
					{
					$change = time () - $last;}
					if ( $change > 0)
					{
						
					echo "Welcome ".$_SESSION["username"]." ! <br> You last visited on ". date("d/m/Y",$last).", at ".date("H:i,a",$last) ;
					}
				}
				else{
					echo "Welcome to my site! That's your first visit!>";
				}
			}
			else{
				echo '<div class="form-group">
  						<label for="usr">Username:</label>
  						<input type="text" name="username" class="form-control" id="usr">
					</div>
  					<div class="form-group">
   						<label for="pwd">Password:</label>
    					<input type="password" name="password" class="form-control" id="pwd">
  					</div>
  		 			<p style="padding-top: 10px;"><a href="#">forget password</a></p>
  					<button type="submit" class="btn btn-primary">log in</button>';	
			}

		?>
		
	</form>

  	</div>
</div>
</div>
<button type="button" class="btn btn-danger btn-md" style="margin-bottom: 25px; margin-top: 25px;"><a href="report.php" class="text-light">Feedback</a></button>
<?php	
	if($_SESSION["type"]=="0"){
		include "admin/includes/footer.php";
	}
	else{
		include "includes/footer.php";
	}
?>