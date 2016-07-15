

<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'Job board';
require_once('header.php');
require_once('navmenu.php');

$ROOT = '../../';
$IMAGES = 'images/';


	
	$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	$sql = "SELECT * FROM job_board";
	$result = $conn->query($sql);	
	
	?>
	<div class="container">
	
	<h3>Jobaccino Search</h3>
  <form method="get" action="search.php">
   <fieldset class="form-group">
    <label for="usersearch">Find your industry coffee job:</label><br />
    <input type="text" id="usersearch" name="usersearch"  class="form-control"/><br />
    <input type="submit" name="submit" value="Submit" class="btn-default"/>
	 </fieldset>
  </form>
  
		<table class="table">
			<thead>
				<tr>
					<th>Job ID</th>
					<th>Title</th>
					<th>City</th>
					<th>Province</th>
					<th>Postal Code</th>
					<th>Company Name</th>
					<th>Posting Date</th>
					<th>Keywords</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>".$row["job_id"]."</td>";
					echo "<td>".$row["title"]."</td>";
					echo "<td>".$row["city"]."</td>";
					echo "<td>".$row["province"]."</td>";
					echo "<td>".$row["postal_code"]."</td>";
					echo "<td>".$row["company"]."</td>";
					echo "<td>".$row["date"]."</td>";
					echo "<td>".$row["keywords"]."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		
	</div>
	<?php
	


 require_once('footer.php');
?>
