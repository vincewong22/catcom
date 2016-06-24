<?php
session_start();
include_once('appvars.php');

if(!isset($_SESSION['user_id'])){
	echo '<a href="login.php">Please login</a>';
	exit(); //stop executing the script
}
else{
	echo'You are logged in as: ' . $_SESSION['username'];
	$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	echo'<br/>';
		if($conn->connect_error)
			echo 'connection failure';
		else
			echo'connection to database successful...';
	
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
$picture = $row['picture'];
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
    $picture = mysqli_real_escape_string($conn, trim($_POST['picture']));
	
	if (!empty($firstname) && !empty($lastname) && !empty($gender) && !empty($birthdate) && !empty($city) && !empty($province)) {
	 $sql = "UPDATE USER_TABLE SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', 
	 city = '$city', email = '$email', province = '$province' , intro='$intro' WHERE user_id =".$_SESSION['user_id'];
	 echo '<br/>';
	if($conn->query($sql))
		echo'Profile successfully updated';
	else
		echo'Profile failed to update';
	}
}
	


	
    
}//end of else


?>

 <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <fieldset>
      <legend>Personal Information</legend>
      <label for="firstname">First name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($firstname)) echo $firstname; ?>" /><br />
      <label for="lastname">Last name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($lastname)) echo $lastname; ?>" /><br />
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
        <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
		<option value="N" <?php if (!empty($gender) && $gender == 'N') echo 'selected = "selected"'; ?>>Prefer Not To Say</option>
      </select><br />
      <label for="birthdate">Birthdate:</label>
      <input type="text" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br />
	  <label for="city">City:</label>
      <input type="text" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" /><br />
      <label for="province">Province:</label>
      <input type="text" id="province" name="province" value="<?php if (!empty($province)) echo $province; ?>" /><br />
	  <label for"intro">Introduction: </label>
	  <input type="text" id="intro" name="intro" value="<?php if (!empty($intro)) echo $intro; ?>" /><br />
      <label for="picture">Picture:</label>
      <input type="file" id="picture" name="picture" />
    </fieldset>
    <input type="submit" value="Save Profile" name="submit" />
  </form>
  <a href="index.php">Done editing profile</a>