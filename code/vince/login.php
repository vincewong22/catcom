
<?php
session_start();
require_once('appvars.php');
if(!isset($_SESSION['user_id'])){
	if(isset($_POST['submit'])){
		$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	
		if($conn->connect_error)
			echo 'connection failure';
		else
			echo'connection to database successful...';
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty($username) || !empty($password)){
		$sql = "SELECT user_id, username FROM USER_TABLE
				WHERE username = '$username' AND password = SHA('$password')";
		
		$result = $conn->query($sql);
		echo '<br/>';
		
		if($result->num_rows == 1){
			echo 'login found in database';
			$row = $result->fetch_assoc();
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['username'] = $row['username'];
			header('Location: index.php');
		}
		else
			echo 'login details incorrect,';
			echo '<a href="index.php"> return to main page</a> or try again: <br/>'; 
		}
		echo '<br/>';
		
	}//check submit
}//check user_id
else{
/* echo 'Your already logged in as: '. $_SESSION['username'] .'<br/>';
echo '<a href="logout.php">Log Out</a><br/>';
echo '<a href="index.php">Main Page</a><br/>'; */
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	username <input type="text" name="username" value="<?php echo $_POST['username']?>"/><br/>
	password <input type="password" name="password"/><br/>
	<input type="submit" value="Log in" name="submit"/>
</form>
