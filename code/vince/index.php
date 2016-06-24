Welcome to Jobaccino <br/>

<?php
session_start();
include_once('appvars.php');

if(isset($_SESSION['username'])){
	echo '<a href="viewprofile.php">View Profile</a><br/>';
	echo '<a href="editprofile.php">Edit Profile</a><br/>';
	echo '<a href="logout.php">Log out (' . $_SESSION['username'].')</a><br/>';
}
else{
	echo '<a href="login.php">Log In</a><br/>';
	echo '<a href="signup.php">Sign Up</a><br/>';
}


$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

echo '<br/>';
if($conn->connect_error)
	echo 'error connecting'.$conn->connect_error;
else
	echo 'success connecting...';


$sql = "SELECT * FROM USER_TABLE";

$result = $conn->query($sql);

echo'<br/>';
/* if($result->num_rows >0)
	echo 'success grabbing table';
else
	echo 'failure grabbing table'; */

echo ' most recent members: ';

while($row = $result->fetch_assoc()){

echo '<br/>username: ' . $row['username'] ; 
echo ' join-date: ' . $row['join_date'] ; 
}
?>