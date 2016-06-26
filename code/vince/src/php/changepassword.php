<?php
//signup form

require_once('startsession.php');
require_once('appvars.php');
$page_title = ' Change password';
require_once('header.php');
require_once('navmenu.php');

//connect to database b/c need to verify if a username alredy exists
$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//error messages
/* if($conn->connect_error)
	echo 'error conencting...';
else
	echo 'success connecting....'; */

if(isset($_POST['submit'])){

$oldpassword = mysqli_real_escape_string($conn, trim($_POST['oldpassword']));
$password1 = mysqli_real_escape_string($conn, trim($_POST['password1']));
$password2 = mysqli_real_escape_string($conn, trim($_POST['password2']));


if (!empty($oldpassword) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {

		
      $sql = "SELECT password FROM USER_TABLE WHERE user_id= ".$_SESSION['user_id']." AND password=SHA('".$oldpassword."')";
	  $result = $conn->query($sql);
		echo '<br/>';
	  if($result->num_rows ==1){
		 $sql = "UPDATE USER_TABLE SET password=SHA('$password1')WHERE user_id=".$_SESSION['user_id'];
		if($conn->query($sql)){
			echo '<br/>';
			echo 'Your password was changed successfully';
			exit();
			}
		else
			echo 'database error, password was not changed';
		}
		else
			echo 'your old password was incorrect';
}		
else{
	if (empty($oldpassword) || empty($password1) || empty($password2)) 
		echo '<br/>failed to input all fields!';
	if (($password1 != $password2))
		echo '<br/>passwords do not match!';
}	
}//end of  submit
$conn->close;


?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	oldpassword: <input type="text" name="oldpassword" value="<?php echo $oldpassword?>"/><br/>
	password <input type="password" name="password1" value="<?php echo $password1?>"/><br/>
	confirm password (retype)<input type="password" name="password2" value="<?php echo $password2?>"/><br/>
	<input type="submit" value="Change Password" name="submit"/>
</form>
<?php
 require_once('footer.php');
?>