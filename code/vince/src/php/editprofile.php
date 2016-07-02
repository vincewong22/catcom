<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'Edit Profile';
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
    //$picture = mysqli_real_escape_string($conn, trim($_POST['picture']));
	$picture = $_FILES['picture']['name'];
	
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
	 city = '$city', email = '$email', province = '$province' , intro='$intro' WHERE user_id =".$_SESSION['user_id'];
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
    <fieldset>
      <legend>Personal Information for: <?php echo $_SESSION['username'];?></legend>
	  <div class="form-group">
      <label for="firstname">First name:</label>
	  <input type="text"  class="form-control" id="firstname" name="firstname" value="<?php if (!empty($firstname)) echo $firstname; ?>" /><br />
      </div>
	  
	 <div class="form-group">
	 <label for="lastname">Last name:</label>
     <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if (!empty($lastname)) echo $lastname; ?>" /><br />
     </div>
	 
	 <div class="form-group">
	 <label for="gender">Gender:</label>
      	  <select class="form-control" id="gender" name="gender">
        <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
        <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
		<option value="N" <?php if (!empty($gender) && $gender == 'N') echo 'selected = "selected"'; ?>>Prefer Not To Say</option>
      </select><br />
	  </div>
      
	   <div class="form-group">
	  <label for="birthdate">Birthdate:</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />
      </div>
	  
	   <div class="form-group">
	  <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br />
	  </div>
	  
	   <div class="form-group">
	  <label for="city">City:</label>
      <input type="text" class="form-control" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" /><br />
      <div>
	  
	   <div class="form-group">
	  <label for="province">Province:</label>
      <input type="text" class="form-control" id="province" name="province" value="<?php if (!empty($province)) echo $province; ?>" /><br />
	  </div>
	  
	  <label for="intro">Introduction: </label>
	  <!-- <input type="text" id="intro" name="intro" value="<?php if (!empty($intro)) echo $intro; ?>" /><br />-->
      <textarea class="form-control" id="intro" name="intro" rows="4" cols="50" placeholder="Describe yourself here...(max 150 chars)"></textarea>
	  
	  <label for="picture">Picture:</label>
      <input type="file" id="picture" name="picture" />
    </fieldset>
    <input type="submit" value="Save Profile" name="submit" />
  </form>
  </div>