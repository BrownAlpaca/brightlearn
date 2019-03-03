<?php
	session_start();
	$pageTitle = 'MC';

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
<div class="container">
			<?php
				echo '<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Code</th>
								<th>Name</th>
								<th>Description</th>
								<th>Instructor</th>
								<th>Manage</th>
							<tr>
						</thead>
					<tbody>';			
					$Ctable="SELECT c_id,c_code,c_name,c_desc,c_instructor FROM courses";
					$result = $conn->query($Ctable);
		            if ($result->num_rows > 0) {
		            	// output data of each row
		                while($row = $result->fetch_assoc()) {
		                    echo '<tr>
		        					<td>'.$row["c_id"].'</td>
		        					<td>'.$row["c_code"].'</td>
		        					<td>'.$row["c_name"].'</td>
		        					<td>'.$row["c_desc"].'</td>
		        					<td>'.$row["c_instructor"].'</td>
		        					<td> <a href="#" class="btn btn-info" role="button">manage</a></td>
		      					</tr>';
		                }
		            }
		            echo '</tbody></table>';
			?>	
</div>
<?php	
		include "includes/footer.php";
?>