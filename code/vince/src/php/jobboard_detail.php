

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
	$row = $result->fetch_assoc();
	$job_id = $row['job_id'];
	$title = $row['title'];
	$short_desc = $row['short_desc'];
	$description = $row['description'];
	$city = $row['city'];
	$province = $row['province'];
	$postal_code = $row['postal_code'];
	$company = $row['company'];
	$date = $row['date'];
	
	
	
	
	?>
	<div class="container">
	
		
		<?php
			
			echo '<img id="profPicture" class="main_image" src="'. IMAGE_PATH . $picture. '"/>';
		
		?>
		</div>
		<div id="jobboard">
		
		<div class="form-group">
			<label for="job_id">Job id:</label>
			<input type="text"  class="form-control" id="job_id" name="job_id" value="<?php if (!empty($job_id)) echo $job_id; ?>" disabled/><br />
		</div>
	  
		<div class="form-group">
			<label for="title">Position:</label>
			<input type="text"  class="form-control" id="title" name="title" value="<?php if (!empty($title)) echo $title; ?>" disabled/><br />
		</div>
		
		<div class="form-group">
			<label for="short_desc">Description:</label>
			<textarea rows="4" cols="50"class="form-control" id="short_desc" disabled><?php if (!empty($short_desc)) echo $short_desc; ?></textarea>
			
		</div>
		
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text"  class="form-control" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" disabled/><br />
		</div>
		
		<div class="form-group">
			<label for="province">Province:</label>
			<input type="text"  class="form-control" id="province" name="province" value="<?php if (!empty($province)) echo $province; ?>" disabled/><br />
		</div>
		
		
		<div class="form-group">
			<label for="company">Company:</label>
			<input type="text"  class="form-control" id="company" name="company" value="<?php if (!empty($company)) echo $company; ?>" disabled/><br />
		</div>
		
		<div class="form-group">
			<label for="job_id">Date:</label>
			<input type="text"  class="form-control" id="date" name="date" value="<?php if (!empty($date)) echo $date; ?>" disabled/><br />
		</div>
	  
			
			<?php
			echo '<img id="profPicture" class="collection" src="'. IMAGE_PATH . $pic1. '"/>';
			?>
		
	</div>
	<?php
	


 require_once('footer.php');
?>
