<?php
  session_start();
  if($_SESSION["username"]==null){
              header("Location: index.php?attempt=unauthorized_access");
  }
  $pageTitle = 'report';
  if($_SESSION["type"]=="0"){
    include "admin/includes/header.php";
  }
  else{
    include "includes/header.php";
  } 
?>
<div class="container">
  <div class="row">
    <div class="col-9">  
      <form action="report.php" method="post" class="bg-light" id="reportF" style="margin:50px; padding: 10px;">
      	<div class="form-group">
      		<label for="usr">Name:</label>
      		<input type="text" class="form-control" id="usr" required>
      	</div>	
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="form-group">
    		<select required>
    			<option value="#">Type of issue:</option>
      			<option value="Link not working">Link not working</option>
      			<option value="Page not found">Page not found</option>
      			<option value="Incorrect script">Incorrect script</option>
    		</select>
    	</div>
    	<div class="form-group">
    		<textarea required rows="4" cols="50">
    		</textarea>
    	</div>	
        <button type="submit" class="btn btn-primary">Submit</button>
        <input class="btn btn-danger" type="button" value="Clear" onclick="document.getElementById('reportF').reset();">
      </form>
    </div>  
  <div class="col-3">
        
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
<?php
	include "includes/footer.php";
?>