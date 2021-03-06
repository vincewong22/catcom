<?php
require_once('startsession.php');
require_once('appvars.php');
$page_title = 'Login';
require_once('header.php');
require_once('navmenu.php');
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
			header('Location: ../../index.php');
		}
		else{
			echo 'Login details incorrect, try again';
		}
		echo '<br/>';
		
	}//check submit
}//check user_id
}
  
?>
<div class="container">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" id="username" class="form-control" name="username" value="<?php echo $_POST['username']?>"/><br/>
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" id="password" class="form-control" name="password"/><br/>
		<input type="submit" value="Log in" name="submit"/>
	</div>
</form>
</div>

<?php
require_once('footer.php');
?>