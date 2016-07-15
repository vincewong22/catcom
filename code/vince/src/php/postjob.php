<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'Post Job';
require_once('header.php');
require_once('navmenu.php');


if(!isset($_SESSION['user_id'])){
	echo 'Please login';
	exit(); //stop executing the script
}
else{
	//echo'You are logged in as: ' . $_SESSION['username'];
	$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
/* 	echo'<br/>';
		if($conn->connect_error)
			echo 'connection failure';
		else
			echo'connection to database successful...'; */
	
	$sql = "SELECT * FROM USER_TABLE WHERE user_id =".$_SESSION['user_id'];

$result = $conn->query($sql);

if(!isset($_POST['submit'])){

$row = $result->fetch_assoc();
$firstname= $row['firstname'];
$lastname = $row['lastname'];
$gender = $row['gender'];
$birthdate = $row['birthdate'];
$email = $row['email'];
$city = $row['city'];
$province = $row['province'];
$intro = $row['intro'];
$old_picture = $row['picture'];
$number = $row['number'];

}
else{
	//take modified changes
	$firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $birthdate = mysqli_real_escape_string($conn, trim($_POST['birthdate']));
	$email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
	$intro = mysqli_real_escape_string($conn, trim($_POST['intro']));
    $province = mysqli_real_escape_string($conn, trim($_POST['province']));
	$number = mysqli_real_escape_string($conn, trim($_POST['number']));
	$picture = $_FILES['picture']['name'];
	
	$pic1 = $_FILES['pic1']['name'];
	$pic2 = $_FILES['pic2']['name'];
	$pic3 = $_FILES['pic3']['name'];
	$pic4 = $_FILES['pic4']['name'];
	
	// Validate and move the uploaded picture file, if necessary
    if (!empty($picture)) {
		$sql = "UPDATE USER_TABLE SET picture = '$picture' WHERE user_id =".$_SESSION['user_id'];
		if($conn->query($sql)){
			echo'Profile successfully updated';
		}
		else
			echo'Profile failed to update';
	
        $target = IMAGE_PATH . $picture;
		echo $target;
	if(move_uploaded_file($_FILES['picture']['tmp_name'],$target))
		echo 'file moved';
	else
		echo 'file not moved';
    }
	
	//update profile
	if (!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($birthdate) && !empty($city) && !empty($province)) {
	 $sql = "UPDATE USER_TABLE SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', 
	 city = '$city', email = '$email', province = '$province' , intro='$intro', number='$number' WHERE user_id =".$_SESSION['user_id'];
	 echo '<br/>';
	if($conn->query($sql)){
		echo'Profile successfully updated';
	}
	else
		echo'Profile failed to update';
	}
}  
}//end of else

  require_once('footer.php');
?>
<div class="container">
 <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
 <div class="container">
	
		</div>
		<div id="jobboard">
		
		<div class="form-group">
			<label for="title">Position:</label>
			<input type="text"  class="form-control" id="title" name="title" value="<?php if (!empty($title)) echo $title; ?>" /><br />
		</div>
		
		<div class="form-group">
			<label for="short_desc">Description:</label>
			<textarea rows="4" cols="50"class="form-control" id="short_desc" ><?php if (!empty($short_desc)) echo $short_desc; ?></textarea>
			
		</div>
		
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text"  class="form-control" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" /><br />
		</div>
		
		<div class="form-group">
			<label for="province">Province:</label>
			<input type="text"  class="form-control" id="province" name="province" value="<?php if (!empty($province)) echo $province; ?>" /><br />
		</div>
		
		
		<div class="form-group">
			<label for="company">Company:</label>
			<input type="text"  class="form-control" id="company" name="company" value="<?php if (!empty($company)) echo $company; ?>" /><br />
		</div>
		
		<div class="form-group">
			<label for="job_id">Date:</label>
			<input type="text"  class="form-control" id="date" name="date" value="<?php if (!empty($date)) echo $date; ?>" /><br />
		</div>
	  
			
	</div>
    <input type="submit" value="Post Job" name="submit" />
  </form>
  </div>
  