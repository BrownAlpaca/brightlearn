<?php
    session_start();
    if($_SESSION["username"]==null){
              header("Location: index.php?attempt=unauthorized_access");
    }

    $pageTitle = 'my-courses';
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
            <?php 
                $MYcourse="SELECT c_id,c_code,c_name,c_desc,c_instructor FROM courses";
                $result = $conn->query($MYcourse);
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="card bg-light">
                                <div class="card-body">
                                    <h2 class="card-title"><a href="cposts.php?cid='.$row["c_id"].'" class="card-link">'.$row["c_code"].": ".$row["c_name"].'</a>
                                    </h2>
                                    <p class="card-text"><a href="#" class="card-link">'.$row["c_instructor"].'<br/></a>
                                    </p>
                                    <p class="card-text">'.$row["c_desc"]."</p>
                                </div>
                            </div>";

                    }
                }
                else{
                    echo "0 results";
                }
            ?>
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
<button type="button" class="btn btn-danger btn-md" style="margin-bottom: 25px; margin-top: 25px;"><a href="report.php" class="text-light">Feedback</a></button>




<?php
	include "includes/footer.php";
?>

