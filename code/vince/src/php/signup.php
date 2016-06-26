<?php
//signup form

require_once('startsession.php');
require_once('appvars.php');
$page_title = ' Sign Up';
require_once('header.php');
require_once('navmenu.php');

//connect to database b/c need to verify if a username alredy exists
$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//error messages
if($conn->connect_error)
	echo 'error conencting...';
else
	echo 'success connecting....';

if(isset($_POST['submit'])){

$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password1 = mysqli_real_escape_string($conn, trim($_POST['password1']));
$password2 = mysqli_real_escape_string($conn, trim($_POST['password2']));


if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {

// Make sure someone isn't already registered using this username
      $sql = "SELECT * FROM USER_TABLE WHERE username = '$username'";
	  $result = $conn->query($sql);
	  if($result->num_rows ==0){
	 
	 $sql = "INSERT INTO USER_TABLE (username,password)
			VALUES ('$username',SHA('$password1'))";
			
	if($conn->query($sql)){
	echo '<br/>';
	echo 'Your new account has been successfully created';
	exit();
	}
	else
	echo 'failed to insert username';
	  }
	  else{
	  // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different username.</p>';
        $username = "";
	  }
}//end of password check
else{
	if($password1 != $password2)
		echo 'your passwords do not match';
	else
		echo 'You must enter all sign-up data!';
}
}//end of  submit

$conn->close;


?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	username <input type="text" name="username" value="<?php echo $username?>"/><br/>
	password <input type="password" name="password1" value="<?php echo $password1?>"/><br/>
	confirm password (retype)<input type="password" name="password2" value="<?php echo $password2?>"/><br/>
	<input type="submit" value="Sign Up" name="submit"/>
</form>
<?php
 require_once('footer.php');
?>